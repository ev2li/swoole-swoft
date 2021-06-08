<?php

function NewPro(int $pid, string $name) {
    $p = new stdClass();
    {
        $p->pid = $pid;
        $p->name = $name . $p->pid;
    }
    return $p;
}

function response($contentType = false){
    if($contentType){
        return \Swoft\Context\Context::get()->getResponse()->withContentType($contentType);
    }
    return \Swoft\Context\Context::get()->getResponse();
}

function request(){
    return \Swoft\Context\Context::get()->getRequest();
}