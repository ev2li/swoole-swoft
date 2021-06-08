<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-08
 * Time: 17:18
 */

require ("vendor/autoload.php");

function filterMethod($name){
    $name = strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1',  $name));
    return $name;
}

$name = "ProdId";

echo filterMethod($name);