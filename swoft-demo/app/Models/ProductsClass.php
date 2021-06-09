<?php declare(strict_types=1);


namespace App\Models;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class ProductsClass
 *
 * @since 2.0
 *
 * @Entity(table="products_class")
 */
class ProductsClass extends Model
{
    /**
     * 
     * @Id()
     * @Column(name="pclass_id", prop="pclassId")
     *
     * @var int
     */
    private $pclassId;

    /**
     * 
     *
     * @Column(name="pclass_name", prop="pclassName")
     *
     * @var string
     */
    private $pclassName;


    /**
     * @param int $pclassId
     *
     * @return self
     */
    public function setPclassId(int $pclassId): self
    {
        $this->pclassId = $pclassId;

        return $this;
    }

    /**
     * @param string $pclassName
     *
     * @return self
     */
    public function setPclassName(string $pclassName): self
    {
        $this->pclassName = $pclassName;

        return $this;
    }

    /**
     * @return int
     */
    public function getPclassId(): ?int
    {
        return $this->pclassId;
    }

    /**
     * @return string
     */
    public function getPclassName(): ?string
    {
        return $this->pclassName;
    }

}
