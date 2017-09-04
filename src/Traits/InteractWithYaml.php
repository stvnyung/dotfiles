<?php

namespace Dotfiles\Traits;

use Symfony\Component\Yaml\Yaml;

trait InteractWithYaml
{
    public static function read($file)
    {
        $file = file_get_contents($file);

        return Yaml::parse($file);
    }

    public static function readResources($file, $attribute = null, $default = null)
    {
        $configs = self::read(resources_path($file));

        if ($attribute) {
            return array_key_exists($attribute, $configs)
                ? $configs[$attribute]
                : $default;
        }

        return $configs;
    }

    public static function writeResources($file, $configs)
    {
        $file = resources_path($file);

        $yaml = Yaml::dump($configs);

        file_put_contents($file, $yaml);
    }
}
