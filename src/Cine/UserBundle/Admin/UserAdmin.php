<?php

namespace Cine\UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab("Général")
                ->with('Identitée', array('class' => 'col-xs-6'))
                    ->add('civilite', 'choice', array(
                        'label' => 'Civilite',
                        'choices' => array('Mr' => 'Mr', 'Mme' => 'Mme'),
                        'multiple' => false,
                        'expanded' => false
                    ))
                    ->add('nom', 'text', array(
                        'label' => 'Nom'
                    ))
                    ->add('prenom', 'text', array(
                        'label' => 'Prénom'
                    ))
                ->end()
                ->with('Autres', array('class' => 'col-xs-6'))
//                    ->add('familles', null, array(
//                        'label' => "Famille d'utilisateur",
//                        "property" => "nom",
//                        'required' => true
//                    ))
                    ->add('enabled', null, array(
                        'label' => 'Actif',
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab("Droits")
                ->with('Communauté des services')
                    ->add('groups', 'sonata_type_model', array(
                        'property' => 'name',
                        'expanded' => true,
                        'multiple' => true,
                        'btn_add' => true
                    ))
                ->end()
            ->end()
            ->tab("Accès")
                ->with('Accès')
                    ->add('username', 'text', array(
                        'label' => 'Pseudo'
                    ))
                    ->add('email', 'text', array(
                        'label' => 'E-mail'
                    ))
                    ->add('plainPassword', 'text', array(
                        'label' => 'Mot de passe'
                    ))
                ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('username')
                ->add('nom')
//                ->add('familles')
                ->add('enabled', null, array('label' => 'Actif'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('username')
                ->add('nom')
                ->add('enabled', null, array('label' => 'Actif'))
        ;
    }
}