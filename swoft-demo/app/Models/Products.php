<?php declare(strict_types=1);


namespace App\Models;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class Products
 *
 * @since 2.0
 *
 * @Entity(table="products")
 */
class Products extends Model
{
    /**
     * 
     * @Id()
     * @Column(name="prod_id", prop="prodId")
     *
     * @var int
     */
    private $prodId;

    /**
     * 
     *
     * @Column(name="prod_name", prop="prodName")
     *
     * @var string
     */
    private $prodName;

    /**
     * 
     *
     * @Column(name="prod_price", prop="prodPrice")
     *
     * @var int
     */
    private $prodPrice;

    /**
     * 
     *
     * @Column(name="prod_stock", prop="prodStock")
     *
     * @var int|null
     */
    private $prodStock;

    /**
     * 
     *
     * @Column(name="prod_cid", prop="prodCid")
     *
     * @var int|null
     */
    private $prodCid;

    /**
     *
     *
     * @Column(name="prod_click", prop="prodClick")
     *
     * @var int|null
     */
    private $prodClick;

    /**
     * @return int|null
     */
    public function getProdClick(): ?int
    {
        return $this->prodClick;
    }

    /**
     * @param int|null $prodClick
     */
    public function setProdClick(?int $prodClick): void
    {
        $this->prodClick = $prodClick;
    }

    /**
     * @param int $prodId
     *
     * @return self
     */
    public function setProdId(int $prodId): self
    {
        $this->prodId = $prodId;

        return $this;
    }

    /**
     * @param string $prodName
     *
     * @return self
     */
    public function setProdName(string $prodName): self
    {
        $this->prodName = $prodName;

        return $this;
    }

    /**
     * @param int $prodPrice
     *
     * @return self
     */
    public function setProdPrice(int $prodPrice): self
    {
        $this->prodPrice = $prodPrice;

        return $this;
    }

    /**
     * @param int|null $prodStock
     *
     * @return self
     */
    public function setProdStock(?int $prodStock): self
    {
        $this->prodStock = $prodStock;

        return $this;
    }

    /**
     * @param int|null $prodCid
     *
     * @return self
     */
    public function setProdCid(?int $prodCid): self
    {
        $this->prodCid = $prodCid;

        return $this;
    }

    /**
     * @return int
     */
    public function getProdId(): ?int
    {
        return $this->prodId;
    }

    /**
     * @return string
     */
    public function getProdName(): ?string
    {
        return $this->prodName;
    }

    /**
     * @return int
     */
    public function getProdPrice(): ?int
    {
        return $this->prodPrice;
    }

    /**
     * @return int|null
     */
    public function getProdStock(): ?int
    {
        return $this->prodStock;
    }

    /**
     * @return int|null
     */
    public function getProdCid(): ?int
    {
        return $this->prodCid;
    }

}
