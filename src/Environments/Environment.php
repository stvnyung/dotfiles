<?php

namespace Dotfiles\Environments;

use Dotfiles\Traits\GetClassName;
use Dotfiles\Traits\MapFunctionAsAttribute;

abstract class Environment
{
    use MapFunctionAsAttribute,
        GetClassName;

    public function run()
    {
        if ($this->installer)
        {
            print("Running installer\n");

            $this->installer->run();
        }

        if ($configurator = $this->configurator)
        {
            print("Running configurator\n");

            $this->configurator->run();
        }

        if ($symlinker = $this->symlinker)
        {
            print("Running symlinker\n");

            $this->symlinker->run();
        }

        $this->after();
    }

    protected function after()
    {
        //
    }

    protected function installer()
    {
        $class = '\\Dotfiles\\Installers\\' . $this->getShortName();

        if (class_exists($class)) {
            return (new $class);
        }

        return false;
    }

    protected function configurator()
    {
        $class = '\\Dotfiles\\Configurators\\' . $this->getShortName();

        if (class_exists($class)) {
            return (new $class);
        }

        return false;
    }

    protected function symlinker()
    {
        $class = '\\Dotfiles\\Symlinkers\\' . $this->getShortName();

        if (class_exists($class)) {
            return (new $class);
        }

        return false;
    }
}
