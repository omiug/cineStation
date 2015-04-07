<?php

namespace Cine\CmsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TreeNodeSelectorType extends AbstractType
{

    public function getParent()
    {
        return 'entity';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'tree_url' => null,
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'tree_url' => null,
        ));
    }

    public function buildView(FormView $view, FormInterface $form,
                              array $options)
    {
        if (array_key_exists('tree_url', $options)) {
            $view->vars['tree_url'] = $options['tree_url'];
        }
    }

    public function getName()
    {
        return 'cine_tree_node_selector';
    }
}