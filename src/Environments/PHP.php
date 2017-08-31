<?php

namespace Dotfiles\Environments;

use Dotfiles\Installers;
use Dotfiles\Configurators;
use Dotfiles\Symlinkers;

class PHP extends Environment
{
    protected function installer()
    {
        return Installers\PHP::class;
    }

    protected function configurator()
    {
        return Configurators\PHP::class;
    }

    protected function symlinker()
    {
        return Symlinkers\PHP::class;
    }
}
