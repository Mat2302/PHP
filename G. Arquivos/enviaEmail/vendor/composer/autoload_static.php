<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit287ab7e5e1738536d58a3c03f9a7b632
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit287ab7e5e1738536d58a3c03f9a7b632::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit287ab7e5e1738536d58a3c03f9a7b632::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit287ab7e5e1738536d58a3c03f9a7b632::$classMap;

        }, null, ClassLoader::class);
    }
}