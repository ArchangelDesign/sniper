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
     * @Column(type="string", length=255, nullable=false, unique=true)
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
     * @var string|null
     * @Column(type="string", nullable=true)
     */
    protected $saleDate;

    /**
     * @var string|null
     * @Column(type="string", length=20)
     */
    protected $saleDateTime;

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
     * @var boolean|null
     * @Column(type="boolean", nullable=true)
     */
    protected $ignore;

    /**
     * @var bool|null
     * @Column(type="boolean", nullable=true)
     */
    protected $keysIncluded;

    /**
     * @var string|null
     * @Column(type="string", nullable=true)
     */
    protected $primaryDamage;

    /**
     * @var string|null
     * @Column(type="string", nullable=true, length=50)
     */
    protected $engineType;

    /**
     * @var string|null
     * @Column(type="string", nullable=false, length=30)
     */
    protected $estimatedValue;

    /**
     * @var string|null
     * @Column(type="string", nullable=true)
     */
    protected $imageUrl;

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
     * @return string|null
     */
    public function getSaleDate(): ?string
    {
        return $this->saleDate;
    }

    /**
     * @param string|null $saleDate
     * @return Subject
     */
    public function setSaleDate(?string $saleDate): Subject
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

    /**
     * @return bool|null
     */
    public function getIgnore(): ?bool
    {
        return $this->ignore;
    }

    /**
     * @param bool|null $ignore
     * @return Subject
     */
    public function setIgnore(?bool $ignore): Subject
    {
        $this->ignore = $ignore;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getKeysIncluded(): ?bool
    {
        return $this->keysIncluded;
    }

    /**
     * @param bool|null $keysIncluded
     * @return Subject
     */
    public function setKeysIncluded(?bool $keysIncluded): Subject
    {
        $this->keysIncluded = $keysIncluded;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrimaryDamage(): ?string
    {
        return $this->primaryDamage;
    }

    /**
     * @param string|null $primaryDamage
     * @return Subject
     */
    public function setPrimaryDamage(?string $primaryDamage): Subject
    {
        $this->primaryDamage = $primaryDamage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEngineType(): ?string
    {
        return $this->engineType;
    }

    /**
     * @param string|null $engineType
     * @return Subject
     */
    public function setEngineType(?string $engineType): Subject
    {
        $this->engineType = $engineType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEstimatedValue(): ?string
    {
        return $this->estimatedValue;
    }

    /**
     * @param string|null $estimatedValue
     * @return Subject
     */
    public function setEstimatedValue(?string $estimatedValue): Subject
    {
        $this->estimatedValue = $estimatedValue;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSaleDateTime(): ?string
    {
        return $this->saleDateTime;
    }

    /**
     * @param string|null $saleDateTime
     * @return Subject
     */
    public function setSaleDateTime(?string $saleDateTime): Subject
    {
        $this->saleDateTime = $saleDateTime;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     * @return Subject
     */
    public function setImageUrl(?string $imageUrl): Subject
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }
}
