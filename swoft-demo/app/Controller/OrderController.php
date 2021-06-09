<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-09
 * Time: 17:31
 */

namespace App\Controller;


use App\Exception\ApiException;
use App\Models\OrdersMain;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Validator\Annotation\Mapping\Validate;

/**
 * Class OrderController
 * @Controller(prefix="/order")
 */
class OrderController
{
    /**
     * @Validate(validator="orders")
     * @RequestMapping(route="new", method={RequestMethod::POST})
     *
     */
    public function createOrder(){
        $orderPost = jsonForObject(OrdersMain::class);
//        throw new ApiException("api except");
        if($orderPost){
            if($orderPost->save()){
                $orderNo = date("Ymf").substr(implode(NULL, array_map( 'ord', str_split(substr(uniqid(), 7,13),1))),0,8);
                $orderPost->setOrderNo($orderNo);
                $orderPost->setCreateTime(date('Y-m-d h:i:s'));
                if($orderPost->save()){
                    return OrderCreateSuccess($orderNo);
                }
            }
        }
        return $orderPost;
    }
}