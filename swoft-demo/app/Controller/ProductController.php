<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-07
 * Time: 17:43
 */

namespace App\Controller;


use App\lib\ProductEntity;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use App\Http\Middleware\ControllerMiddleware;
/**
 * Class ProductController
 * @package App\Controller
 * @Controller(prefix="/product")
 * @Middleware(ControllerMiddleware::class)
 */
class ProductController
{
    /**
     * @RequestMapping("/product", method={RequestMethod::GET})
     */
    public function prod_list(): object {
        $req = Context::get()->getRequest();
        $res = Context::get()->getResponse();
         return $res->withContentType("application/json")
             ->withData([NewPro(101, "swoft框架测试")
             ,NewPro(102, "swoole入门")]);
    }

    /**
     * @RequestMapping("{id}", params={"id"="\d+"},method={RequestMethod::GET,RequestMethod::POST})
     */
    public function prod_detail(int $id){
//        request()->get("type", "default type");
        $p = NewPro($id, "测试商品-链式");
        $product = jsonForObject(ProductEntity::class);
        var_dump($product);
        if(isGet()){
            return $p;
        }else if (isPost()){
            $p->name = "修改商品";
            return $p;
        }

        //return response()->withContentType("application/json")->withData([$p]);
//        return $response->withContentType("application/json")->withData([$p]);
//        return \response(ContentType::JSON)->withData([$p]);

    }
}