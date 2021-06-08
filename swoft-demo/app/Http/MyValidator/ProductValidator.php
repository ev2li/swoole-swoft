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
     * @IsString()
     * @var string
     */
    protected $prod_name;

    /**
     * @IsFloat()
     * @var float
     */
    protected $prod_price;
}
