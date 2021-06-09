<?php declare(strict_types=1);


namespace App\Models;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class OrdersMain
 *
 * @since 2.0
 *
 * @Entity(table="orders_main")
 */
class OrdersMain extends Model
{
    /**
     * 
     * @Id()
     * @Column(name="order_id", prop="orderId")
     *
     * @var int
     */
    private $orderId;

    /**
     * 
     *
     * @Column(name="order_no", prop="orderNo")
     *
     * @var string|null
     */
    private $orderNo;

    /**
     * 
     *
     * @Column(name="user_id", prop="userId")
     *
     * @var int|null
     */
    private $userId;

    /**
     * 
     *
     * @Column(name="order_status", prop="orderStatus")
     *
     * @var int|null
     */
    private $orderStatus;

    /**
     * 
     *
     * @Column(name="order_money", prop="orderMoney")
     *
     * @var float|null
     */
    private $orderMoney;

    /**
     * 
     *
     * @Column(name="create_time", prop="createTime")
     *
     * @var string|null
     */
    private $createTime;


    /**
     * @param int $orderId
     *
     * @return self
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @param string|null $orderNo
     *
     * @return self
     */
    public function setOrderNo(?string $orderNo): self
    {
        $this->orderNo = $orderNo;

        return $this;
    }

    /**
     * @param int|null $userId
     *
     * @return self
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param int|null $orderStatus
     *
     * @return self
     */
    public function setOrderStatus(?int $orderStatus): self
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * @param float|null $orderMoney
     *
     * @return self
     */
    public function setOrderMoney(?float $orderMoney): self
    {
        $this->orderMoney = $orderMoney;

        return $this;
    }

    /**
     * @param string|null $createTime
     *
     * @return self
     */
    public function setCreateTime(?string $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @return string|null
     */
    public function getOrderNo(): ?string
    {
        return $this->orderNo;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return int|null
     */
    public function getOrderStatus(): ?int
    {
        return $this->orderStatus;
    }

    /**
     * @return float|null
     */
    public function getOrderMoney(): ?float
    {
        return $this->orderMoney;
    }

    /**
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

}
