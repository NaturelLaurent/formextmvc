<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd489a0dccad170af0d5ec3687f1d7b81
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd489a0dccad170af0d5ec3687f1d7b81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd489a0dccad170af0d5ec3687f1d7b81::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}