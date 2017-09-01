<?php

namespace Dotfiles\Configurators;

use Dotfiles\Traits\ReadYaml;
use Dotfiles\Traits\MapFunctionAsAttribute;

abstract class Configurator
{
    use ReadYaml,
        MapFunctionAsAttribute;

    abstract protected function file();

    public function run()
    {
        $cmds = self::readConfig($this->file);

        foreach ($cmds as $cmd) {
            exec($cmd);
        }
    }
}
