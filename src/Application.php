<?php

namespace Dotfiles;

use League\CLImate\CLImate;
use Dotfiles\Configurators;
use Dotfiles\Installers;
use Dotfiles\Symlinkers;
use Dotfiles\Environments;

class Application
{
    private $cmd;
    private $climate;
    private $installer;

    public function __construct(CLImate $climate)
    {
        $this->climate = $climate;
        $this->cmd = $this->climate->arguments->get('install');
    }

    private function environments()
    {
        return [
            'atom' => Environments\Atom::class,
            'brew' => Environments\Brew::class,
            'cask' => Environments\Cask::class,
            'git' => Environments\Git::class,
            'macos' => Environments\MacOS::class,
            'php' => Environments\PHP::class,
            'valet' => Environments\Valet::class,
            'zsh' => Environments\Zsh::class,
        ];
    }

    private function choices()
    {
        return array_merge(['all' => '*'], $this->environments());
    }


    public function run()
    {
        if (! $this->cmd) {
            $this->cmd = $this->climate->radio('Choose the environment to setup:', array_keys($this->choices()))->prompt();
        }

        if ($this->cmd === 'all')
        {
            foreach ($this->environments() as $env) {
                (new $env)->run();
            }

            return;
        }

        if (! array_key_exists($this->cmd, $this->environments()))
        {
            $this->climate->to('error')->red("Installer {$this->cmd} doesn't exists.");

            return;
        }

        $this->environment($this->cmd)->run();
    }

    private function environment($name)
    {
        $environments = $this->environments();

        $env = $environments[$name];

        return (new $env);
    }
}
