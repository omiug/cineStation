<?php

namespace Application\Sonata\MediaBundle\Admin;
use Sonata\MediaBundle\Admin\ORM\MediaAdmin as Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MediaAdmin extends Admin {
    protected function configureFormFields(FormMapper $formMapper) {
        parent::configureFormFields($formMapper);
//        if ($this->getSubjectId()) {
//
//            $formMapper
//                    ->add('tags', null, array(
//                        'label' => 'Tags',
//                        'required' => false
//                        ))
//                ->end()
//                ->with('Prestations')
//                    ->add ('prestationTypes', null, array(
//                        'label' => 'Type de prestation',
//                        'required' => false
//                        ))
//                    ->add ('prestationOs', null, array(
//                        'label' => 'Systèmes d\'exploitation',
//                        'required' => false
//                    ))
//                ->end();
//        }
    }

    public function getSubjectId() {
       if(is_object($this->getSubject()) && $this->getSubject()->getId()){
           return $this->getSubject()->getId();
       }
       return null;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        parent::configureDatagridFilters($datagridMapper);
//        $datagridMapper
//                ->add('prestationOs', null, array(
//                    'label' => 'Systeme'
//                ));
    }

}
