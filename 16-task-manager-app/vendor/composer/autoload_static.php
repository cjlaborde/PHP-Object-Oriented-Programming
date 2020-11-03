<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dd81f8fdb6f5282c11580bacea73a70
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Todo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Todo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dd81f8fdb6f5282c11580bacea73a70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dd81f8fdb6f5282c11580bacea73a70::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
