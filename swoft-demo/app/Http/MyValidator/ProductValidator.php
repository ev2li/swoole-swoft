<?php
namespace App\Http\MyValidator;

use Swoft\Validator\Annotation\Mapping\Validator;
use Swoft\Validator\Annotation\Mapping\IsFloat;
use Swoft\Validator\Annotation\Mapping\IsString;

/**
 * 商品验证
 * @Validator(name="product")
 */
class ProductValidator {
    /**
     * @IsString(message="商品名称不能为空")
     * @var string
     */
    protected $prod_name;

    /**
     * @IsFloat(message="商品价格不能为空")
     * @var float
     */
    protected $prod_price;
}
