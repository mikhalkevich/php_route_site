<?php
/**
 * Created by PhpStorm.
 * Date: 09.12.2017
 * Time: 0:08
 */


function my_autoload($class_name)
{
    # List all the class directories in the array.
    $array_paths = array(
        '/models/',
        '/function/'
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}
spl_autoload_register('my_autoload');