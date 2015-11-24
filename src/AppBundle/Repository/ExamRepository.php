<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\Expr as Expr;

class ExamRepository extends EntityRepository
{

    public function findCatchAll($id = null)
    {
        $qb = $this->createQueryBuilder('e');
        $qb
            ->select('e')
            ->orderBy('e.id', 'DESC');
        if (null !== $id) {
            $qb
                ->where('e.id = :id')
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