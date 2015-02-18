<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FilmAdmin extends Admin
{
	protected function configureFormFields(FormMapper $FormMapper){
		$FormMapper
			->tab("Description")
				->with('Synopsis', array('class' => 'col-xs-5'))
					->add('titre', 'text', array(
						'label' => 'Titre du Film',
						'required' => true
					))
					->add('synopsis', 'text', array(
						'label' => 'Résumé objectif de l\'histoire',
						'required' => true
					))
				->end()
				->with('Médias', array('class' => 'col-xs-7'))
					->add('poster', 'sonata_type_model_list', array('required' => false), array(
                        'link_parameters' => array('context' => 'default'),
                    ))
                    ->add('bandeAnnonce', 'text', array(
						'label' => 'URL de la bande annonce',
						'required' => true
					))
				->end()
			->end()
			->tab("Fiche Technique")
				->with('Casting')
					->add('anneeReal', 'datetime', array(
						'label' => 'Date de sortie',
						'required' => true
					))
					->add('genres', 'sonata_type_model', array(
						'label' => 'Genre',
						'required' => true
					))
					->add('pays', 'text', array(
						'label' => 'Nationalité',
						'required' => true
					))
					->add('budget', 'text', array(
						'label' => 'Budget',
						'required' => true
					))
					->add('recompenses', 'text', array(
						'label' => 'Récompenses'
					))
					->add('budget', 'text', array(
						'label' => 'Budget',
						'required' => true
					))
					->add('dureeFilm', 'time', array(
						'label' => 'Durée du film',
						'required' => true
					))
				->end()
			->end()
			->tab("Critique")
				->with('Avis Personnel', array('class'=> 'col-xs-4'))
					->add('critique', 'text', array(
							'label' => 'Critique',
							'required' => true
					))
				->end()
				->with('Synthèse Positive', array('class'=> 'col-xs-4'))
					->add('bonPoint', 'text', array(
							'label' => 'Bon Point',
							'required' => true
					))
				->end()
				->with('Synthèse Négative', array('class'=> 'col-xs-4'))				
					->add('mauvaisPoint', 'text', array(
							'label' => 'Mauvais Point',
							'required' => true
					))
				->end()
			->end();
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
    }

    protected function configureListFields(ListMapper $listMapper) {
    }

}