<?php


namespace App\Services;


use App\Entities\Subject;

class SubjectService
{

    private DatabaseService $db;

    public function __construct(DatabaseService $db)
    {
        $this->db = $db;
    }

    /**
     * @return Subject[]
     */
    public function fetchSubjects(): array
    {
        return $this->db->getEntityManager()
            ->createQueryBuilder()
            ->select('s')
            ->from('\App\Entities\Subject', 's')
            ->getQuery()
            ->getResult();
    }

    public function update(Subject $subject, $flush = true)
    {
        $this->db->getEntityManager()->persist($subject);
        if ($flush)
            $this->db->getEntityManager()->flush();
    }
}
