<?php

namespace Dotfiles\Environments;

use Dotfiles\Installers;
use Dotfiles\Configurators;
use Dotfiles\Symlinkers;

class Zsh extends Environment
{
    protected function installer()
    {
        return Installers\Zsh::class;
    }

    protected function configurator()
    {
        return Configurators\Zsh::class;
    }

    protected function symlinker()
    {
        return Symlinkers\Zsh::class;
    }
}
