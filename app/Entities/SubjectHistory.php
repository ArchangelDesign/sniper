<?php


namespace App\Entities;

/**
 * @Entity
 * @Table(name="subject_history")
 * Class Subject
 * @package App\Entities
 */
class SubjectHistory
{
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * @var bool|null
     * @Column(type="boolean", nullable=true)
     */
    protected $isBiddingOpen;

    /**
     * @var int|null
     * @Column(type="integer", nullable=true)
     */
    protected $currentBid;

    /**
     * @var Subject
     * @ManyToOne(targetEntity="\App\Entities\Subject", inversedBy="history")
     * @JoinColumn(name="subject_id", referencedColumnName="id")
     */
    protected $subject;

    /**
     * @param Subject $subject
     * @param int $currentBid
     * @return SubjectHistory
     */
    public static function build(Subject $subject, int $currentBid): SubjectHistory
    {
        $entity = new static();
        $entity->setSubject($subject)
            ->setCurrentBid($currentBid);

        return $entity;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SubjectHistory
     */
    public function setId(int $id): SubjectHistory
    {
        $this->id = $id;
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
     * @return SubjectHistory
     */
    public function setIsBiddingOpen(?bool $isBiddingOpen): SubjectHistory
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
     * @return SubjectHistory
     */
    public function setCurrentBid(?int $currentBid): SubjectHistory
    {
        $this->currentBid = $currentBid;
        return $this;
    }

    /**
     * @return Subject
     */
    public function getSubject(): Subject
    {
        return $this->subject;
    }

    /**
     * @param Subject $subject
     * @return SubjectHistory
     */
    public function setSubject(Subject $subject): SubjectHistory
    {
        $this->subject = $subject;
        return $this;
    }
}
