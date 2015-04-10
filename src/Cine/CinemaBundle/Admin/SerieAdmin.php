<?php

namespace Cine\CinemaBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SerieAdmin extends CinemaAdmin
{
	protected function configureFormFields(FormMapper $FormMapper){
        parent::configureFormFields($FormMapper);
	}
}