<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-09
 * Time: 18:24
 */

function OrderCreateSuccess($orderNo){
    return ['status' => 'success', 'orderNo' => $orderNo];
}

function OrderCreateFail(){
    return ['status' => 'error', 'orderNo' => ''];
}