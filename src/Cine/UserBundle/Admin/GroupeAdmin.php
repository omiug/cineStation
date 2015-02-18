<?php

namespace Cine\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GroupeAdmin extends Admin
{
    protected $allSecurityRoles = array();

    public function setAllSecurityRoles($securityRoles){
        $this->allSecurityRoles = $securityRoles;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $allSecurityRoles = array();
        foreach ($this->allSecurityRoles as $securRole){
            $allSecurityRoles[$securRole] = $securRole;
        }

        $formMapper
            ->with("Général")
                ->add('name')
                ->add('roles', 'choice', array(
                    "choices"  => $allSecurityRoles,
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false
                ))
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('roles')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    public function getNewInstance()
    {
        $class = $this->getClass();

        return new $class('', array());
    }

}
