<?php

namespace WodorNet\PrintShopBundle\Entity;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{

    public function findTasksForDashBoard($type, $status)
    {

        $qb = $this->createQueryBuilder('t');
        if(is_null($status)) {
            $status = array(Task::STATUS_READY,Task::STATUS_INPROGRESS);
        }
        $qb->join('t.machineModel','m');
        $qb->where($qb->expr()->andX(
            $qb->expr()->in('t.status',':status'),
            $qb->expr()->eq('m.type', ':type')
        ));

        $qb->setParameter('status', $status);
        $qb->setParameter('type', $type);
        return $qb->getQuery()->getResult();
    }

} 