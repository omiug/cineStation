<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CinemaAdmin extends Admin
{
	protected function configureFormFields(FormMapper $FormMapper){
		$FormMapper
			->tab("Description")
				->with('Synopsis', array('class' => 'col-xs-7 col-sm-7 col-md-7'))
					->add('titre', 'text', array(
						'label' => 'Titre',
						'required' => true
					))
					->add('synopsis', 'textarea', array(
						'label' => 'Résumé objectif de l\'histoire',
						'required' => true
					))
					->add('actif', null, array(
						'label' => 'Actif'
					))
				->end()
			->end()
			->tab("Fiche Technique")
				->with('Essentiel', array('class' => 'col-xs-6 col-sm-6 col-md-6'))
					->add('anneeReal', null, array(
						'label' => 'Date de sortie',
						'required' => true,
                    ))
					->add('pays', 'country', array(
						'label' => 'Nationalité',
						'required' => true
					))
				->end()
				->with('Autre', array('class' => 'col-xs-6 col-sm-6 col-md-6'))
					->add('budget', 'text', array(
						'label' => 'Budget',
						'required' => false
					))
					->add('recompenses', 'text', array(
						'label' => 'Récompenses',
						'required' => false
					))
				->end()

			->end();
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('titre')
            ->add('actif');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('titre')
            ->add('actif');
    }

}