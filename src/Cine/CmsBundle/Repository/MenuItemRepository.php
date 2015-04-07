<?php

namespace Cine\CmsBundle\Repository;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * MenuItemRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MenuItemRepository extends NestedTreeRepository
{

    /**
     * 
     * @param type $menuId
     * @return type
     * @todo repasser par gedmo
     */
    public function getFirstLvlItemsByMenuCode($menuCode)
    {
        return $this->createQueryBuilder('m')
                ->select('m')
                ->orderBy('m.root, m.lft', 'ASC')
                ->where('m.menu = :menuCode')
                ->andWhere('m.lvl in(1)')
                ->addSelect('child')
                ->leftJoin('m.children', 'child')
                ->addSelect('subChild')
                ->leftJoin('child.children', 'subChild')
                ->addSelect('sub2Child')
                ->leftJoin('subChild.children', 'sub2Child')
                ->setParameter(':menuCode', $menuCode)
                ->getQuery()
                ->getResult();
    }

    /**
     * 
     * @param type $menuId
     * @return type
     */
    public function getMenuItemTreeByMenuId($menuId)
    {
        $query = $this->createQueryBuilder('m')
            ->orderBy('m.root, m.lft', 'ASC')
            ->where('m.menu = :menuId')
            ->setParameter(':menuId', $menuId)
            ->getQuery();
        return $this->buildTree($query->getArrayResult());
    }

    /**
     * 
     * @param type $menuId
     * @return type
     */
    public function getRootByMenuId($menuId)
    {
        return $this->createQueryBuilder('m')
                ->where('m.menu = :menuId')
                ->andWhere('m.id = m.root')
                ->setParameter(':menuId', $menuId)
                ->setMaxResults(1)
                ->getQuery()->getSingleResult();
    }

    /**
     * 
     * @param type $menuId
     * @return type
     */
    public function getRootByMenuCode($menuCode)
    {
        return $this->createQueryBuilder('m')
                ->where('menu.code = :menuCode')
                ->leftJoin('m.menu', 'menu')
                ->andWhere('m.id = m.root')
                ->setParameter(':menuCode', $menuCode)
                ->getQuery()->getSingleResult();
    }
}