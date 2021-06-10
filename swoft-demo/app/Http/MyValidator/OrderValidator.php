<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-09
 * Time: 17:25
 */

namespace App\Http\MyValidator;

use App\Http\MyValidator\myrules\OrderDetail;
use Swoft\Validator\Annotation\Mapping\IsArray;
use Swoft\Validator\Annotation\Mapping\IsFloat;
use Swoft\Validator\Annotation\Mapping\IsInt;
//use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Max;
use Swoft\Validator\Annotation\Mapping\Min;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * 商品验证
 * @since 2.0
 * @Validator(name="orders")
 */
class OrderValidator
{
//    /**
//     * @IsString(message="订单号不能为空")
//     * @var string
//     */
//    protected $order_no;

    /**
     * @IsInt(message="用户ID不能为空")
     * @Min(value=1, message="用户ID不正确")
     * @var int
     */
    protected $user_id;

    /**
     * @IsInt(message="订单状态不能为空")
     * @Min(value=0, message="状态不正确min")
     * @Max(value=5, message="状态不正确max")
     * @var int
     */
    protected $order_status;

    /**
     * @IsFloat(message="订单金额不能为空")
     * @Min(value=1, message="订单金额不正确")
     * @var int
     */
    protected $order_money;

    /**
     * @IsArray(message="订单明细不能为空")
     * @OrderDetail(message="订单明细不正确")
     * @var array
     */
    protected $order_item; //商品订单明细数据，是一个数组
}