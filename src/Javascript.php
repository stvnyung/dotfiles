<?php

namespace Dotfiles;

class Javascript
{
    function __construct()
    {
        $this->cmds = [
            'brew' => 'brew install',
            'npm-global' => 'npm install -g',
        ];

        $this->packages = [
            'brew' => [
                'npm',
                'yarn',
            ],
            'npm-global' => [
                'gulp-cli',
                'vue-cli',
            ],
        ];
    }

    function run()
    {
        foreach ($this->packages as $packageManager => $packages)
        {
            $cmd = $this->cmds[$packageManager];

            foreach ($packages as $package)
            {
                exec("{$cmd} {$package}");
            }
        }
    }
}
