<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\Expr as Expr;

class StudentRepository extends EntityRepository
{

    public function findCatchAll($id = null)
    {
        $qb = $this->createQueryBuilder('s');
        $qb
            ->select('s')
            ->orderBy('s.id', 'DESC');
        if (null !== $id) {
            $qb
                ->where('s.id = :id')
                ->setParameters([
                    ':id' => $id,
                ])
            ;
        }
        return null === $id
            ? $qb->getQuery()->getArrayResult()
            : $qb->getQuery()->getSingleResult(AbstractQuery::HYDRATE_ARRAY);
    }
}