<?php

namespace Tests\Browser;

use App\Entities\Subject;
use App\Services\SubjectService;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CopartSyncTest extends DuskTestCase
{
    /** @var SubjectService */
    private $subjectService;

    private $cacheLotDetails;

    public function testCopartImporter()
    {
        Log::info('-- COPART --');
        /** @var SubjectService $subjectService */
        $subjectService = $this->app->make(SubjectService::class);
        $this->subjectService = $subjectService;

        foreach ($subjectService->fetchSubjects() as $subject) {
            if ($subject->getIgnore())
                continue;
            if (!is_null($subject->getLastSync())) {

            }
            $this->cacheLotDetails = null;
            $trimmed = $this->trimHttps($subject->getUrl());
            $baseUrl = 'https://' . substr($trimmed, 0, strpos($trimmed, '/'));
//            Log::info('Base URL is ' . $baseUrl);
            $this->browse(function (Browser $browser) use($baseUrl, $subject) {
                $browser::$baseUrl = $baseUrl;
                try {
                    $this->processSubjectPage($browser, $subject);
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                    Log::error($e->getTraceAsString());
                    throw $e;
                }
            });
        }
        $this->assertTrue(true);
    }

    private function trimHttps(string $url): string
    {
        return str_replace('https://', '', $url);
    }

    private function processSubjectPage(Browser $browser, Subject $subject)
    {
        Log::info('processing : ' . (empty($subject->getTitle()) ? $subject->getUrl() : $subject->getTitle()) . ' ID: ' . $subject->getId());
        $browser->visit($this->getUri($subject));
        $onSale = $this->isSubjectOnSale($browser);
        Log::info($onSale ? 'ON SALE' : 'FUTURE LOT');
        $subject
            ->setTitle($this->getSubjectTitle($browser))
            ->setIsBiddingOpen($onSale)
            ->setPrimaryDamage($this->getSubjectPrimaryDamage($browser))
            ->setEngineType($this->getSubjectEngineType($browser))
            ->setEstimatedValue($this->getSubjectEstimatedValue($browser))
            ->setSaleDate($this->getSubjectSaleDateString($browser))
            ->setLastSync(new \DateTime());
        if ($onSale) {
            $subject
                ->setSaleDateTime($this->getConvertedSaleDate($this->getSubjectSaleDateString($browser)))
                ->setDaysLeft($this->getSubjectDaysLeft($browser))
                ->setHoursLeft($this->getSubjectHoursLeft($browser))
                ->setCurrentBid($this->getSubjectCurrentBid($browser));
        }
        Log::debug('updating...');
        $this->subjectService->update($subject);
        Log::debug('done.');
    }

    private function priceStringToInt(string $textPrice): int
    {
        $price = str_replace(['$', ' ', ',','USD'], '', $textPrice);
        return intval($price);
    }

    private function getSubjectCurrentBid(Browser $browser): int
    {
        $browser->waitFor('.bid-price', 3);
        return $this->priceStringToInt($browser->element('.bid-price')->getText());
    }

    private function getSubjectTitle(Browser $browser)
    {
        $browser->waitFor('h1.title', 3);
        return $browser->element('h1.title')->getText();
    }

    private function getSubjectTimeLeftString(Browser $browser)
    {
        $firstOption = $browser->driver->findElement(WebDriverBy::xpath('/html/body/div[2]/div[3]/div/app-root/div/div[1]/div/div[2]/div/div/div[1]/div[2]/div[4]/div[2]/div[5]/span'));

        return $firstOption->getText();
    }

    private function getUri(Subject $subject)
    {
        return substr($this->trimHttps($subject->getUrl()), strpos($this->trimHttps($subject->getUrl()), '/'));
    }

    private function getSubjectDaysLeft(Browser $browser): int
    {
        $timeLeftString = $this->getSubjectTimeLeftString($browser);
        if (!preg_match('/\d*D\s/', $timeLeftString, $matches))
            return 0;
        return intval(trim(str_replace('D', '', $matches[0])));
    }

    private function getSubjectHoursLeft(Browser $browser): int
    {
        $timeLeftString = $this->getSubjectTimeLeftString($browser);
        Log::debug('time left: ' . $timeLeftString);
        if (!preg_match('/\d*H\s/', $timeLeftString, $matches))
            return 0;
        return intval(trim(str_replace('H', '', $matches[0])));
    }

    /**
     * @param Browser $browser
     * @return string|null
     */
    private function getSubjectSaleDateString(Browser $browser)
    {
        $browser->waitFor('span[data-uname="lotdetailSaleinformationsaledatevalue"]', 3);
        $wrapSpan = $browser->element('span[data-uname="lotdetailSaleinformationsaledatevalue"]');
        if (is_null($wrapSpan))
            return null;
        return trim(str_replace('Sale Date: ', '', $wrapSpan->getText()));
    }

    private function getConvertedSaleDate(string $saleDate): string
    {
        // Thu. Oct 28, 2021 - 10:00 AM EDT
        list($dayOfWeek, $month, $day, $year, $dash, $time, $ampm, $timeZone) = explode(' ', $saleDate);
        $day = str_replace(',', '', $day);
        list($hour, $minute) = explode(':', $time);
        if ($ampm == 'PM')
            $hour += 12;
        $dt = new \DateTime();
        $dt->setTime($hour, $minute);
        $dt->setDate($year, $this->monthToInt($month), $day);
        return $dt->format('Y-m-d H:i:s');
    }

    private function getSubjectAllLotDetails(Browser $browser)
    {
        if (!empty($this->cacheLotDetails))
            return $this->cacheLotDetails;
        $allDetails = $browser->elements('span.lot-details-desc');
        $result = [];
        foreach ($allDetails as $detail) {
            $dataKey = $detail->getAttribute('data-uname');
            $dataValue = $detail->getText();
            $result[$dataKey] = $dataValue;
        }
        $this->cacheLotDetails = $result;
        return $result;
    }

    private function getSubjectPrimaryDamage(Browser $browser)
    {
        $details = $this->getSubjectAllLotDetails($browser);
        return $details['lotdetailPrimarydamagevalue'] ?? 'N/A';
    }

    private function getSubjectEngineType(Browser $browser)
    {
        return $this->getSubjectAllLotDetails($browser)['lotdetailEnginetype'] ?? 'N/A';
    }

    private function isSubjectOnSale(Browser $browser): bool
    {
        $saleDate = $this->getSubjectSaleDateString($browser);
        return strpos($saleDate, 'Lot') === false
            && strpos($saleDate, 'Future') === false
            && !empty(trim($saleDate));
    }

    private function getSubjectEstimatedValue(Browser $browser)
    {
        return $this->getSubjectAllLotDetails($browser)['lotdetailEstimatedretailvalue'] ?? 'N/A';
    }

    private function monthToInt(string $month)
    {
        $map = [
            'Oct' => 10,
            'Nov' => 11,
            'Dec' => 12
        ];

        return $map[$month];
    }
}