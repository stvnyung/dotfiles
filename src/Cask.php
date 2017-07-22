<?php

namespace Dotfiles;

class Cask extends InstallCommand
{
    function __construct()
    {
        $this->cmd = 'brew cask install';
        $this->packages = [
            /* Productivity */
            'evernote',
            'webcatalog',

            /* Utility */
            'flux',
            'avast-mac-security',

            /* Communication */
            'slack',
            'gitter',
            'discord',
            'teamviewer',
            'skype',

            /* Browser */
            'google-chrome',
            'firefox',

            /* Dev Tools */
            'sourcetree',
            'sequel-pro',
            'dash',
            'zeplin',
            'postman',

            /* Entertainment */
            'vlc',
            'spotify',
        ];
    }
}
