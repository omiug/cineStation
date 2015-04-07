<?php

namespace Cine\CmsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use \Knp\Menu\MenuFactory;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{

    /**
     *
     * @param \Knp\Menu\FactoryInterface $factory
     * @param array $options
     * @return type
     */
    public function createMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine')->getManager();
        $security = $this->container->get('security.context');

        $menu = $em->getRepository('CineCmsBundle:Menu')->findOneByCode($options['code']);

        if (!$menu) {
            throw new \Exception('Aucun menu trouvé');
        }
        $menuItems = $em->getRepository('CineCmsBundle:MenuItem')->getFirstLvlItemsByMenuCode($menu->getId());
        $renderMenu = $factory->createItem($menu->getCode());
        foreach ($menuItems as $menuItem) {
            $roles = $menuItem->getRoles();
            $display = (is_null($roles) || !count($roles)) ? true : false;
            if (!$display) {
                foreach ($roles as $r) {
                    if ($security->isGranted($r)) {
                        $display = true;
                        break;
                    }
                }
            }
            if ($display) {
                $this->createItem($menuItem, $renderMenu);
            }
        }
        return $renderMenu;
    }

    /**
     *
     * @param type $menuItem
     * @param type $renderMenu
     */
    public function createItem($menuItem, $renderMenu)
    {
        $security = $this->container->get('security.context');
        $router = $this->container->get('router');
        $clear = false;
        if ($menuItem->getLvl() == 2) {
            if ((($menuItem->getRgt() - $menuItem->getParent()->getLft()) % 8) == 0) {
                $clear = true;
            }
        }
        if ($router->getRouteCollection()->get($menuItem->getRouteName())) {
            $renderMenu->addChild($menuItem->getTitre(),
                array('route' => $menuItem->getRouteName(), 'routeParameters' => $menuItem->getRouteParameter()));
        } else if ($menuItem->getUri()) {
            $renderMenu->addChild($menuItem->getTitre(),
                array('uri' => $menuItem->getUri()));
        } else {
            $renderMenu->addChild($menuItem->getTitre(), array());
        }
        if ($renderMenu->getChild($menuItem->getTitre())) {
            $renderMenu->getChild($menuItem->getTitre())->setExtras(array('clear' => $clear));
        }

        foreach ($menuItem->getChildren()as $subItem) {
            $roles = $subItem->getRoles();
            $display = (is_null($roles) || !count($roles)) ? true : false;
            if (!$display) {
                foreach ($roles as $r) {
                    if ($security->isGranted($r)) {
                        $display = true;
                        break;
                    }
                }
            }

            if ($display) {
                $this->createItem($subItem, $renderMenu[$menuItem->getTitre()]);
            }
        }
    }
}