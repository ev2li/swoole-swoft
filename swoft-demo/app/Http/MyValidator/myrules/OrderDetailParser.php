<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-10
 * Time: 17:33
 */

namespace App\Http\MyValidator\myrules;


use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use Swoft\Validator\ValidatorRegister;

/**
 * @AnnotationParser(annotation=OrderDetail::class)
 */
class OrderDetailParser extends Parser
{
    /**
     * @param int $type
     * @param object $annotationObject
     *
     * @return array
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function parse(int $type, $annotationObject): array
    {
        if ($type != self::TYPE_PROPERTY) {
            return [];
        }
        //向验证器注册一个验证规则
        ValidatorRegister::registerValidatorItem($this->className, $this->propertyName, $annotationObject);
        return [];
    }
}