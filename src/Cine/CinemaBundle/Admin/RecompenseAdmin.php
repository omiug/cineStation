<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RecompenseAdmin extends Admin
{
    private $servRecompense;

    public function setServRecompense($serv) {
        $this->servRecompense = $serv;
    }

    protected function configureFormFields(FormMapper $FormMapper){
        $choices = $this->servRecompense->getAllTypesRecompnseByGroups();
        
        $FormMapper
            ->with('Général')
                ->add('nom', null, array(
                    'label' => 'Nom'
                ))
                ->add('type', 'choice', array(
                    'label' => 'Type',
                    'choices' => $choices
                ))
            ->end();
    }

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('nom');
    }
}
