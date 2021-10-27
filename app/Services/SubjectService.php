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
    public function fetchSubjects(bool $includeClosed = false): array
    {
        return $this->db->getEntityManager()
            ->createQueryBuilder()
            ->select('s')
            ->from('\App\Entities\Subject', 's')
            ->where('s.ignore = 0 ' . (!$includeClosed ? 'and s.finished = 0' : ''))
            ->getQuery()
            ->getResult();
    }

    public function update($entity, $flush = true)
    {
        $this->db->getEntityManager()->persist($entity);
        if ($flush)
            $this->db->getEntityManager()->flush();
    }
}
