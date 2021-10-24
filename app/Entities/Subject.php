<?php


namespace App\Entities;

/**
 * @Entity
 * @Table(name="subjects")
 * Class Subject
 * @package App\Entities
 */
class Subject
{
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $url;

    /**
     * @var string|null
     * @Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @var \DateTime
     * @Column(type="datetime", nullable=false)
     */
    protected $dateAdded;

    /**
     * @var \DateTime|null
     * @Column(type="datetime", nullable=true)
     */
    protected $lastSync;

    /**
     * @var string|null
     * @Column(type="string", nullable=true)
     */
    protected $location;

    /**
     * @var \DateTime|null
     * @Column(type="datetime", nullable=true)
     */
    protected $saleDate;

    /**
     * @var int|null
     * @Column(type="integer", nullable=true)
     */
    protected $daysLeft;

    /**
     * @var int|null
     * @Column(type="integer", nullable=true)
     */
    protected $hoursLeft;

    /**
     * @var bool|null
     * @Column(type="boolean", nullable=true)
     */
    protected $isBiddingOpen = false;

    /**
     * @var int|null
     * @Column(type="integer", nullable=true)
     */
    protected $currentBid;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Subject
     */
    public function setId(int $id): Subject
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Subject
     */
    public function setUrl(string $url): Subject
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Subject
     */
    public function setTitle(?string $title): Subject
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdded(): \DateTime
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     * @return Subject
     */
    public function setDateAdded(\DateTime $dateAdded): Subject
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastSync(): ?\DateTime
    {
        return $this->lastSync;
    }

    /**
     * @param \DateTime|null $lastSync
     * @return Subject
     */
    public function setLastSync(?\DateTime $lastSync): Subject
    {
        $this->lastSync = $lastSync;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return Subject
     */
    public function setLocation(?string $location): Subject
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSaleDate(): ?\DateTime
    {
        return $this->saleDate;
    }

    /**
     * @param \DateTime|null $saleDate
     * @return Subject
     */
    public function setSaleDate(?\DateTime $saleDate): Subject
    {
        $this->saleDate = $saleDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDaysLeft(): ?int
    {
        return $this->daysLeft;
    }

    /**
     * @param int|null $daysLeft
     * @return Subject
     */
    public function setDaysLeft(?int $daysLeft): Subject
    {
        $this->daysLeft = $daysLeft;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHoursLeft(): ?int
    {
        return $this->hoursLeft;
    }

    /**
     * @param int|null $hoursLeft
     * @return Subject
     */
    public function setHoursLeft(?int $hoursLeft): Subject
    {
        $this->hoursLeft = $hoursLeft;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBiddingOpen(): ?bool
    {
        return $this->isBiddingOpen;
    }

    /**
     * @param bool|null $isBiddingOpen
     * @return Subject
     */
    public function setIsBiddingOpen(?bool $isBiddingOpen): Subject
    {
        $this->isBiddingOpen = $isBiddingOpen;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCurrentBid(): ?int
    {
        return $this->currentBid;
    }

    /**
     * @param int|null $currentBid
     * @return Subject
     */
    public function setCurrentBid(?int $currentBid): Subject
    {
        $this->currentBid = $currentBid;
        return $this;
    }

}
