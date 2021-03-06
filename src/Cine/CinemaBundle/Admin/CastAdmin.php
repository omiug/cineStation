<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CastAdmin extends Admin
{
	protected function configureFormFields(FormMapper $FormMapper){
        $FormMapper
            ->with('Général', array('class' => 'col-xs-5 col-md-5'))
                ->add('nom', null, array(
                    'label' => 'Nom'
                ))
                ->add('prenom', null, array(
                    'label' => 'Prénom'
                ))
                ->add('pseudo', null, array(
                    'label' => 'Pseudo',
                    'required' => false
                ))
                ->add('dateNaissance', 'sonata_type_date_picker', array(
                    'label' => 'Date de naissance',
                    'required' => false,
                    'format' => 'dd/MM/yyyy',
                    'widget' => 'single_text'
                ))
                ->add('nationalite', 'country', array(
                    'label' => 'Nationalité',
                    'required' => false
                ))
            ->end()
            ->with('Autres', array('class' => 'col-xs-7 col-md-7'))
                ->add('photo', 'sonata_type_model_list', array(
                    'label' => 'photo',
                    'required' => false
                ), array(
                    'link_parameters' => array('context' => 'default'),
                ))
                ->add('castRecompenses', 'sonata_type_collection', array(
                    'label' => 'Récompenses',
                    'required' => false
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table'
                ))
            ->end();
    }

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('nationalite');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('nationalite');
    }
    
    public function prePersist($object) {
        parent::preUpdate($object);
        
        foreach ( $object->getCastRecompenses() as $cast ) {
            $cast->setCast($object);
        }
    }
    
    public function preUpdate($object) {
        parent::preUpdate($object);
        
        foreach ( $object->getCastRecompenses() as $cast ) {
            $cast->setCast($object);
        }
    }    
}
