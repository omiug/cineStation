<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GenreAdmin extends Admin
{
	protected function configureFormFields(FormMapper $FormMapper){
        $FormMapper
            ->with('Général')
                ->add('nom', null, array(
                    'label' => 'Nom'
                ))
            ->end();
    }

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('nom');
    }
}
