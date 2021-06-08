<?php
/**
 * Created by PhpStorm.
 * User: zhangli
 * Date: 2021-06-08
 * Time: 16:28
 */

namespace App\lib;


class ProductEntity
{
    private $prod_id;
    private $prod_name;
    private $prod_price;

    /**
     * @return mixed
     */
    public function getProdId()
    {
        return $this->prod_id;
    }

    /**
     * @param mixed $prod_id
     */
    public function setProdId($prod_id): void
    {
        $this->prod_id = $prod_id;
    }

    /**
     * @return mixed
     */
    public function getProdName()
    {
        return $this->prod_name;
    }

    /**
     * @param mixed $prod_name
     */
    public function setProdName($prod_name): void
    {
        $this->prod_name = $prod_name;
    }

    /**
     * @return mixed
     */
    public function getProdPrice()
    {
        return $this->prod_price;
    }

    /**
     * @param mixed $prod_price
     */
    public function setProdPrice($prod_price): void
    {
        $this->prod_price = $prod_price;
    }
}