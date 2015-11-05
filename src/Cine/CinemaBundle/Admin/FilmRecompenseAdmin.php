<?php

namespace Cine\CinemaBundle\Admin;

use Cine\CinemaBundle\Service\RecompenseManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FilmRecompenseAdmin extends Admin
{
    protected $recompenseManager;

    public function setMangerRecompense(RecompenseManager $serv) {
        $this->recompenseManager = $serv;
    }

    protected function configureFormFields(FormMapper $FormMapper){
        $choices = $this->recompenseManager->getAllRecompenseFilm();
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
