<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit804b9807c06464e5438873f5457e9bf0
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit804b9807c06464e5438873f5457e9bf0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit804b9807c06464e5438873f5457e9bf0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
