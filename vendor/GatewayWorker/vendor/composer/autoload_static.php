<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46e743296144ef9c03f65506b9248e37
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Workerman\\' => 10,
        ),
        'G' => 
        array (
            'GatewayWorker\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Workerman\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/workerman',
        ),
        'GatewayWorker\\' => 
        array (
            0 => __DIR__ . '/..' . '/workerman/gateway-worker/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46e743296144ef9c03f65506b9248e37::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46e743296144ef9c03f65506b9248e37::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit46e743296144ef9c03f65506b9248e37::$classMap;

        }, null, ClassLoader::class);
    }
}
