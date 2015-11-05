<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CastRecompenseAdmin extends Admin
{
    protected $recompenseManager;

    public function setMangerRecompense(\Cine\CinemaBundle\Service\RecompenseManager $serv) {
        $this->recompenseManager = $serv;
    }

    protected function configureFormFields(FormMapper $FormMapper){
        $choices = $this->recompenseManager->getAllCastRecompnse();

        $FormMapper
            ->with('Général')
                ->add('recompense', null, array(
                    'label' => 'Recompense',
                    'choices' => $choices
                ))
                ->add('annee', null, array(
                    'label' => 'Année'
                ))
            ->end();
    }

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('cast')
            ->add('recompense')
            ->add('annee');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('cast')
            ->add('recompense')
            ->add('annee');
    }
}
