<?php

namespace Cine\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Cine\CmsBundle\Entity\MenuItem;

class MenuAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre', null, array('label' => 'Titre'))
            ->add('actif', null, array('label' => 'Actif'));

        if ((is_object($this->getSubject()) && $this->getSubject()->getId())) {
            $formMapper
                ->add('menuItems', 'cine_tree', array(
                    'label' => 'Elements',
                    'class' => 'CineCmsBundle:Menu'
                ));
        }

        $formMapper->end();
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre');
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($object)
    {
        $rootMenu = new MenuItem(); //menu racine unique obligatoire
        $rootMenu->setTitre('(racine)');
        $rootMenu->setMenu($object);
        $object->addMenuItem($rootMenu);
    }
}