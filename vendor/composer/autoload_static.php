<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteefc9f99a46aa970963947396dbcb684
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticIniteefc9f99a46aa970963947396dbcb684::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticIniteefc9f99a46aa970963947396dbcb684::$classMap;

        }, null, ClassLoader::class);
    }
}
