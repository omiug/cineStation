<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FilmAdmin extends CinemaAdmin
{
	protected function configureFormFields(FormMapper $FormMapper){
        parent:: configureFormFields($FormMapper);
        
		$FormMapper
			->tab("Description")
				->with('Médias', array('class' => 'col-xs-5 col-sm-5 col-md-5'))
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
				->with('Essentiel', array('class' => 'col-xs-6 col-sm-6 col-md-6'))
					->add('genres', 'sonata_type_model', array(
						'label' => 'Genre',
						'required' => true
					))
				->end()
			->end();
//			->tab("Critique")
//				->with('Avis Personnel', array('class'=> 'col-xs-4'))
//					->add('critique', 'text', array(
//							'label' => 'Critique',
//							'required' => true
//					))
//				->end()
//				->with('Synthèse Positive', array('class'=> 'col-xs-4'))
//					->add('bonPoint', 'text', array(
//							'label' => 'Bon Point',
//							'required' => true
//					))
//				->end()
//				->with('Synthèse Négative', array('class'=> 'col-xs-4'))
//					->add('mauvaisPoint', 'text', array(
//							'label' => 'Mauvais Point',
//							'required' => true
//					))
//				->end()
//			->end();
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
    }

    protected function configureListFields(ListMapper $listMapper) {
    }

}