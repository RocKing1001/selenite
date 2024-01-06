<?php

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__.'/'.$classPath.'.php';

    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception($class.' evaluates to undefined file '.$file);
    }
});
