<?php

namespace Cine\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class JsTreeController extends Controller
{

    protected function performSecurityChecks()
    {
        if (false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
            throw new AccessDeniedException();
        }
    }

    /**
     *
     * @param type $notInPageId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getPagesTreeAction($notInPageId = null)
    {
        $this->performSecurityChecks();
        $em = $this->getDoctrine()->getManager();

        $pageTree = $em->getRepository('CineCmsBundle:Page')->getHierachyWithNotInId($notInPageId);
        return new Response(json_encode($pageTree));
    }

    /**
     *
     * @param type $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getMenuItemsTreeAction($id)
    {
        $this->performSecurityChecks();
        $menuTree = array();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CineCmsBundle:MenuItem');
        $root = $repo->getRootByMenuId($id);
        if ($root) {
            $menuTree = $em->getRepository('CineCmsBundle:MenuItem')->childrenHierarchy($root);
        }
        return new Response(json_encode(array('tree' => $menuTree, 'rootId' => $root->getId())));
    }

    /**
     *
     * @param type $id
     * @param type $parent
     * @param type $position
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function moveMenuItemsAction($id, $parent, $position)
    {
        $this->performSecurityChecks();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CineCmsBundle:MenuItem');

        $node = $repo->findOneById($id);
        $parentObj = $repo->findOneById($parent);

        if ($parentObj) {
            $node->setParent($parentObj);
        } else {
            die('oooops');
        }
        $em->persist($node);
        $em->flush();

        $repo->moveUp($node, true);
        if ($position) {
            $repo->moveDown($node, $position);
        }


        $em->persist($node);
        $em->flush();
        return new Response(json_encode(array()));
    }
}