<?php

namespace Cine\CmsBundle\Admin;

use DateTime;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin
{
    private $securityContext;

    public function setSecurityContext($secu) {
        $this->securityContext = $secu;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Général')
                ->add('titre', null, array(
                    'label' => 'Titre de l\'article'
                ))
                ->add('contenu', 'textarea', array(
                    'label' => 'Avis',
                    'attr' => array(
                        'class' => 'ckeditor'
                    )
                ))
                ->add('bonsPoints', null, array(
                    'label' => 'Bons Points',
                    'required' => false
                ))
                ->add('mauvaisPoints', null, array(
                    'label' => 'Mauvais Points',
                    'required' => false
                ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('auteur');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            ->add('auteur');
    }

    public function getTemplate($name)
    {
        switch ($name) {
            case 'edit':
                return 'CineCmsBundle:Admin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function prePersist($object)
    {
        $user = $this->securityContext->getToken()->getUser();
        $object->setDateCreation(new DateTime());
        $object->setAuteur($user);
    }

    public function preUpdate($object)
    {
        $object->setDateModification(new DateTime());
    }
}