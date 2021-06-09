<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-07
 * Time: 17:43
 */

namespace App\Controller;


use App\lib\ProductEntity;
use App\Models\Products;
use Swoft\Context\Context;
use Swoft\Db\DB;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use App\Http\Middleware\ControllerMiddleware;
use Swoft\Validator\Annotation\Mapping\Validate;



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
//        $req = Context::get()->getRequest();
        $res = Context::get()->getResponse();
         return $res->withContentType("application/json")
             ->withData([NewPro(101, "swoft框架测试")
             ,NewPro(102, "swoole入门")]);
    }

    /**
     * @Validate(validator="product")
     * @RequestMapping("{id}", params={"id"="\d+"},method={RequestMethod::GET,RequestMethod::POST})
     */
    public function prod_detail(int $id){
//        request()->get("type", "default type");
        //$p = NewPro($id, "测试商品-链式");
        //$product = DB::db("test")->selectOne("select * from products where prod_id = ?", [$id]);

        /*$product = DB::query("swoftdb.pool")
            ->getConnection()->selectOne("select * from products where prod_id = :id", ["id" => $id]);*/
       /* $product = DB::table("product")->get();
        $product = DB::table("product")->where("prod_id","=",$id)->select("prod_id")->first();*/

       /*$product = DB::table("products")
           ->join("products_class", "products.prod_cid", "products_class.pclass_id")
           ->select("products.*", "products_class.pclass_name")
           ->where("products.prod_id", $id)
           ->first();*/

       $product = Products::find($id);
       if($product){
           sgo(function () use($product){
               $product->increment("prod_click");
           });
       }

        //var_dump($product);
        /** @var  $product ProductEntity*/
        //$product = jsonForObject(ProductEntity::class);
//        echo $product->getProdName().PHP_EOL;
        //var_dump($product);
        if(isGet()){
            return $product;
        }else if (isPost()){
//            $product['prod_name'] = "修改商品";
            return $product;
        }

        //return response()->withContentType("application/json")->withData([$p]);
//        return $response->withContentType("application/json")->withData([$p]);
//        return \returnesponse(ContentType::JSON)->withData([$p]);

    }
}
