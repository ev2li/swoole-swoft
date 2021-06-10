<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-08
 * Time: 16:40
 */

function jsonForObject($class){
    $req = request();
    try{
        $contentType = $req->getHeader("content-type");
        if(!$contentType || false === stripos($contentType[0], \Swoft\Http\Message\ContentType::JSON)) {
            return false;
        }
        $raw = $req->getBody()->getContents();
        $map = json_decode($raw, true);
        $class_obj = new ReflectionClass($class);
        $class_instance = $class_obj->newInstance(); //根据反射对象创建实例
        $methods = $class_obj->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method){
            if(preg_match("/^set(\w+)/", $method->getName(),$matches)){
//                echo $matches[1].PHP_EOL;
                invokeSetMethod($matches[1], $class_obj, $map, $class_instance);
            }
        }
        return $class_instance;
    }catch (Exception $exception){
        return false;
    }
}


function invokeSetMethod($name, ReflectionClass $class_obj, $jsonMap, &$class_instance){
//    var_dump($jsonMap);
    //把ProdId转换成Prod_Id
    $filter_name = strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1',  $name));
//    echo $filter_name.PHP_EOL;
    $filter_name_ForSwoft = lcfirst($name); //ucfirst
    $props = $class_obj->getProperties(ReflectionProperty::IS_PRIVATE);
    foreach ($props as $prop){
        if(strtolower($prop->getName()) == $filter_name || $prop->getName() == $filter_name_ForSwoft) { //存在对应的私有属性
            $method = $class_obj->getMethod("set".$name);
            $args = $method->getParameters(); //取出参数
            if(count($args) == 1 && isset($jsonMap[$filter_name])){
                $method->invoke($class_instance, $jsonMap[$filter_name]);
            }
        }
    }
    return $name;
}

function mapToModelsArray(array $maps, $class, $fill = [] ,$toArray = false){
    $ret = [];

    foreach ($maps as $map){
        $getObject = mapToModel($map, $class);
        if($getObject){
            if($fill && count($fill) > 0)
                $getObject->fill($fill);

            if($toArray)
                $ret[] = $getObject->getModelAttrubutes(); //数组
            else
                $ret[] = $getObject; //实体对象
        }
    }

    return $ret;
}

function mapToModel(array $map,$class){ //把数据映射成实体
    try{
        $class_obj = new ReflectionClass($class);
        $class_instance = $class_obj->newInstance(); //根据反射对象创建实例
        $methods = $class_obj->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method){
            if(preg_match("/set(\w+)/", $method->getName(), $matchs)){
                invokeSetMethod($matchs[1], $class_obj, $map, $class_instance);
            };
        }
        return $class_instance;
    }catch (Exception $e){
        return null;
    }
}