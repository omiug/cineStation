<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FilmRecompenseAdmin extends Admin
{
    private $servRecompense;

    public function setServRecompense($serv) {
        $this->servRecompense = $serv;
    }

    protected function configureFormFields(FormMapper $FormMapper){
        $choices = $this->servRecompense->getAllRecompenseFilm();

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
