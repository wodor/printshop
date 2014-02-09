<?php

namespace WodorNet\PrintShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{

    public function findTasksForDashBoard($type)
    {
        $qb = $this->createQueryBuilder('t');
        $qb->join('t.machineModel','m');
        $qb->where($qb->expr()->andX(
           $qb->expr()->eq('t.status', ':status'),
            $qb->expr()->eq('m.type', ':type')
        ));

        $qb->setParameter('status', TASK::STATUS_READY);
        $qb->setParameter('type', $type);
        return $qb->getQuery()->getResult();
    }

} 