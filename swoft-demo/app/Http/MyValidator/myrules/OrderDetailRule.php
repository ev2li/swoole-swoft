<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-10
 * Time: 17:37
 */

namespace App\Http\MyValidator\myrules;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Validator\Contract\RuleInterface;
use Swoft\Validator\Exception\ValidatorException;

/**
 * Class OrderDetailRule
 * @Bean(orderDetail::class)
 */
class OrderDetailRule implements RuleInterface{

    /**
     * @param array $data
     * @param string $propertyName
     * @param object $item
     * @param null $default
     *
     * @return array
     */
    public function validate(array $data, string $propertyName, $item, $default = null, $strict = true): array
    {
        $getData = $data[$propertyName];
        if (!$getData || !is_array($getData) || count($getData) == 0){
            throw new ValidatorException($item->getMessage());
        }

        foreach ($getData as $data){
            \validate($data, "order_detail");
        }

        return $data;
    }
}
