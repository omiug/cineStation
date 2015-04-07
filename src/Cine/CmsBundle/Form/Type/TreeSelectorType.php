<?php

namespace Cine\CmsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;
use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TreeSelectorType extends AbstractType
{

    public function getParent()
    {
        return 'entity';
    }

    public function getName()
    {
        return 'cine_tree_selector';
    }
}