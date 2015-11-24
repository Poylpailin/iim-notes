<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\Expr as Expr;

class GradeRepository extends EntityRepository
{

    public function findCatchAll($id = null)
    {
        $qb = $this->createQueryBuilder('g');
        $qb
            ->select('g')
            ->orderBy('g.id', 'DESC');
        if (null !== $id) {
            $qb
                ->where('g.id = :id')
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