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
				->with('Synopsis', array('class' => 'col-xs-5'))
					->add('titre', 'text', array(
						'label' => 'Titre',
						'required' => true
					))
					->add('synopsis', 'textarea', array(
						'label' => 'Résumé objectif de l\'histoire',
						'required' => true
					))
				->end()
			->end()
			->tab("Fiche Technique")
				->with('Casting')
					->add('anneeReal', 'sonata_type_date_picker', array(
						'label' => 'Date de sortie',
						'required' => true,
                        'format' => 'dd/MM/yyyy',
                        'widget' => 'single_text'
                    ))
					->add('pays', 'country', array(
						'label' => 'Nationalité',
						'required' => true
					))
					->add('budget', 'text', array(
						'label' => 'Budget',
						'required' => false
					))
					->add('recompenses', 'text', array(
						'label' => 'Récompenses',
						'required' => false
					))
					->add('actif', null, array(
						'label' => 'Actif'
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