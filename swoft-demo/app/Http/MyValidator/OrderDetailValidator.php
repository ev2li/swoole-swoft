<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-09
 * Time: 17:25
 */

namespace App\Http\MyValidator;

use Swoft\Validator\Annotation\Mapping\IsFloat;
use Swoft\Validator\Annotation\Mapping\IsInt;
//use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Max;
use Swoft\Validator\Annotation\Mapping\Min;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * 订单明细验证
 * @since 2.0
 * @Validator(name="orders_detail")
 */
class OrderDetailValidator
{
    /**
     * @IsInt(message="商品ID不能为空")
     * @Min(value=1, message="商品ID不正确")
     * @var string
     */
    protected $prod_id;

    /**
     * @IsString(message="商品名称不能为空")
     * @var string
     */
    protected $prod_name;

    /**
     * @IsFloat(message="商品价格不能为空")
     * @Min(value=0, message="商品金额不正确")
     * @var float
     */
    protected $prod_price;

    /**
     * @IsInt(message="折扣不能为空")
     * @Min(value=1, message="折扣不正确min")
     * @Max(value=10, message="折扣不正确max")
     * @var int
     */
    protected $discount;

    /**
     * @IsInt(message="商品数量不能为空")
     * @Min(value=1, message="商品数量不正确")
     * @var int
     */
    protected $prod_num;
}