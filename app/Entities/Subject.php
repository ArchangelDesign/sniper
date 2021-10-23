<?php


namespace App\Entities;

/**
 * @Entity
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
     * @var string
     * @Column(type="string")
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
     * @var bool
     * @Column(type="boolean")
     */
    protected $isBiddingOpen = false;

    /**
     * @var int|null
     * @Column(type="integer", nullable=true)
     */
    protected $currentBid;
}
