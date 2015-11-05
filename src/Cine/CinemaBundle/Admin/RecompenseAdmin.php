<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RecompenseAdmin extends Admin
{
    protected $recompenseManager;

    public function setMangerRecompense(\Cine\CinemaBundle\Service\RecompenseManager $serv) {
        $this->recompenseManager = $serv;
    }

    protected function configureFormFields(FormMapper $FormMapper){
        $choices = $this->recompenseManager->getAllTypesRecompnseByGroups();
        
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
