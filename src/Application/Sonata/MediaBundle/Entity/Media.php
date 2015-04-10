<?php

namespace Application\Sonata\MediaBundle\Entity;

use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;

class Media extends BaseMedia
{
    /**
     * @var integer $id
     */
    protected $id;

    public function __construct()
    {
        $this->enabled = true;
    }

        public function getId()
    {
        return $this->id;
    }
}