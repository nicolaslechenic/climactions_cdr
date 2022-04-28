<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit302d3999eeaca4065f2b6a2f7148d956
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Kercode\\ClimactionsCdr\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Kercode\\ClimactionsCdr\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit302d3999eeaca4065f2b6a2f7148d956::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit302d3999eeaca4065f2b6a2f7148d956::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit302d3999eeaca4065f2b6a2f7148d956::$classMap;

        }, null, ClassLoader::class);
    }
}