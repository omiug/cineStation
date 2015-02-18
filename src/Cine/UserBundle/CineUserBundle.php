<?php

namespace Cine\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CineUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
