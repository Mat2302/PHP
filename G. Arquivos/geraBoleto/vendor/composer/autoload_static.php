<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita50e4a51e2fcc39d43b540d4287b6134
{
    public static $prefixesPsr0 = array (
        'O' => 
        array (
            'OpenBoleto\\' => 
            array (
                0 => __DIR__ . '/..' . '/kriansa/openboleto/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita50e4a51e2fcc39d43b540d4287b6134::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita50e4a51e2fcc39d43b540d4287b6134::$classMap;

        }, null, ClassLoader::class);
    }
}
