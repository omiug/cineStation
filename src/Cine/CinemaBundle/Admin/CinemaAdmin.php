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
					->add('synopsis', 'ckeditor', array(
						'label' => 'Résumé objectif de l\'histoire',
						'required' => true,
                        'config_name' => 'adminLight',
					))
//					->add('synopsis', 'sonata_formatter_type', array(
//    'source_field'         => 'rawDescription',
//    'source_field_options' => array('attr' => array('class' => 'span10', 'rows' => 20)),
//    'format_field'         => 'descriptionFormatter',
//    'target_field'         => 'description',
//    'ckeditor_context'     => 'default',
//    'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher()
//))
            
					->add('actif', null, array(
						'label' => 'Actif',
						'required' => false
					))
				->end()
			->end()
			->tab("Fiche Technique")
				->with('Essentiel', array('class' => 'col-xs-6 col-sm-6 col-md-6'))
					->add('anneeReal', null, array(
						'label' => 'Année de sortie',
						'required' => true,
                    ))
				->end()
				->with('Autre', array('class' => 'col-xs-6 col-sm-6 col-md-6'))
					->add('pays', 'country', array(
						'label' => 'Nationalité',
						'required' => false
					))
					->add('budget', 'text', array(
						'label' => 'Budget',
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