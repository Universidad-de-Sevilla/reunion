<?php

namespace US\Reunion\Repository;

use Doctrine\ORM\EntityRepository;
use US\Reunion\Entity\Person\Group;

class GroupRepository extends EntityRepository
{
    /**
     * @param array $criteria
     * @param array $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Group[]
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @param Group $group
     */
    public function save(Group $group)
    {
        parent::getEntityManager()->persist($group);
        parent::getEntityManager()->flush();
    }

    /**
     * @param int $id
     * @param int|null $lockMode
     * @param int|null $lockVersion
     * @return object Group|null
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return parent::find($id, $lockMode, $lockVersion);
    }
    
    /**
     * @param Group $group
     */
    public function delete(Group $group)
    {
        parent::getEntityManager()->remove($group);
        parent::getEntityManager()->flush();
    }

    /**
     * @return integer
     */
    public function count()
    {

        $dql = /** @lang dql */
            'SELECT COUNT(g.id) FROM US\Reunion\Entity\Person\Group g';
        $query = parent::getEntityManager()->createQuery($dql);

        return $query->getSingleScalarResult();
    }

    public function findByOr($criteria)
    {
        $dql = /** @lang dql */
            'SELECT g FROM US\Reunion\Entity\Person\Group g';
        if (count($criteria) > 0) {
            $dql .= ' WHERE 1 = 0';
            foreach ($criteria as $key => $value) {
                $dql .= " OR g.$key LIKE '%$value%'";
            }
        }
        $query = parent::getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

}