<?php

namespace Cine\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MenuItemAdmin extends Admin {

    protected $entityManager;
    protected $formOptions = array(
        'cascade_validation' => true
    );

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        if ($this->getRequest()->get('parent')) {
            $this->getSubject()->setParent($this->entityManager->getRepository('CineCmsBundle:MenuItem')->findOneById($this->getRequest()->get('parent')));
        }
        if ($this->getRequest()->get('menu')) {
            $this->getSubject()->setMenu($this->entityManager->getRepository('CineCmsBundle:Menu')->findOneById($this->getRequest()->get('menu')));
        }

        $allSecurityRoles = array();
        foreach ( $this->allSecurityRoles as $securRole ){
            $roleExp = explode('_', $securRole);
            if ( in_array($roleExp[1], array('BUNDLE', 'TYPE')) ) {
                $allSecurityRoles[$securRole]=$securRole;
            }
        }

        $menuId = false;
        if (is_object($this->getSubject()->getMenu()) ) {
            $menuId = $this->getSubject()->getMenu()->getId();
        }
        $parentId = false;
        if ( $this->getSubject()->getParent() ) {
            $parentId = $this->getSubject()->getParent()->getId();
        }

        $formMapper
            ->with('Général')
                ->add('titre', null, array('label' => 'Titre'))
                ->add('menu', 'hidden', array(
                    'label' => 'Menu',
                    'attr'  => array("hidden" => true),
                    'data' => $menuId
                ))
                ->add('parent', 'hidden', array(
                    'label' => 'Menu Parent',
                    'attr'  => array("hidden" => true),
                    'data' => $parentId
                ))
                ->add('routeName', null, array('label' => 'Nom route'))
                //->add('routeParameter', null, array('label' => 'Paramètre route'))
                ->add('uri', null, array('label' => 'URI'))
//                ->add('roles', 'choice', array(
//                    "choices"=>$allSecurityRoles,
//                    'expanded' => true,
//                    'multiple' => true,
//                    'required' => false
//                ))
        ;
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'CineCmsBundle:Form:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        parent::configureDatagridFilters($datagridMapper);
    }

    protected function configureListFields(ListMapper $listMapper) {
        parent::configureListFields($listMapper);
    }


    public function getEntityManager() {
        return $this->entityManager;
    }

    public function setRootAsParent($object){
        if (!$object->getParent() && $object->getMenu()){
            $parent = $this->entityManager->getRepository('CineCmsBundle:MenuItem')->getRootByMenuId($object->getMenu()->getId());
            $object->setParent($parent);
        }
    }

    public function setEntityManager($em) {
        $this->entityManager = $em;
    }

    public function setAllSecurityRoles($securityRoles){
        $this->allSecurityRoles=$securityRoles;
    }
    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        if ( !is_object($object->getMenu()) ) {
            $menu = $this->entityManager->getRepository('CineCmsBundle:Menu')
                ->findOneBy(array('id' => $object->getMenu()));
            $object->setMenu($menu);
        }

        $this->setRootAsParent($object);

        if ( !is_object($object->getParent()) ) {
            $parent = $this->entityManager->getRepository('CineCmsBundle:MenuItem')
                ->findOneBy(array('id' => $object->getParent()));
            $object->setParent($parent);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($object)
    {
        if ( !is_object($object->getMenu()) ) {
            $menu = $this->entityManager->getRepository('CineCmsBundle:Menu')
                ->findOneBy(array('id' => $object->getMenu()));
            $object->setMenu($menu);
        }

        $this->setRootAsParent($object);

        if ( !is_object($object->getParent()) ) {
            $parent = $this->entityManager->getRepository('CineCmsBundle:MenuItem')
                ->findOneBy(array('id' => $object->getParent()));
            $object->setParent($parent);
        }
    }

}