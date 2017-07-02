<?php

function __autoload($class){
    include $class.'.class.php';
}

spl_autoload_register('__autoload');