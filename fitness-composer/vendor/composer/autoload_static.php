<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit036bb0aca092a792997800718a242022
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'vladimir\\fitness\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'vladimir\\fitness\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit036bb0aca092a792997800718a242022::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit036bb0aca092a792997800718a242022::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit036bb0aca092a792997800718a242022::$classMap;

        }, null, ClassLoader::class);
    }
}
