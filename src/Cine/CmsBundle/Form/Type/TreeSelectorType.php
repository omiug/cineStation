<?php

namespace Cine\CmsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

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