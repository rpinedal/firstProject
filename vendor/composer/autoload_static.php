<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19c902ed71fb50bf510a0b8bd49e4f5c
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19c902ed71fb50bf510a0b8bd49e4f5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19c902ed71fb50bf510a0b8bd49e4f5c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
