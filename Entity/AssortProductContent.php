<?php

namespace Plugin\AssortContent\Entity;

class AssortProductContent extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $product_id;

    /**
     * @var integer
     */
    private $assort_id;
    
    /**
     * @var \Eccube\Entity\Product
     */
    private $Product;

    /**
     * @var \Plugin\Entity\AssortContent
     */
    private $AssortContent;
    
    public function __construct($AssortContent, $assort_id, $Product, $product_id){
        $this->AssortContent = $AssortContent;
        $this->assort_id = $assort_id;
        $this->Product = $Product;
        $this->product_id = $product_id;
    }
    
    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($id)
    {
        $this->product_id = $id;

        return $this;
    }
    
    public function getAssortId()
    {
        return $this->assort_id;
    }

    public function setAssortId($id)
    {
        $this->assort_id = $id;

        return $this;
    }
    
    /**
     * Set Product
     *
     * @param  \Eccube\Entity\Product $product
     * @return ProductCategory
     */
    public function setProduct(\Eccube\Entity\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \Eccube\Entity\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }
    
    /**
     * Set AssortContent
     *
     * @param  \Plugin\Entity\AssortContent $AssortContent
     * @return ProductCategory
     */
    public function setAssortContent(AssortContent $AssortContent = null)
    {
        $this->AssortContent = $AssortContent;

        return $this;
    }

    /**
     * Get Product
     *
     * @return \Plugin\Entity\AssortContent
     */
    public function getAssortContent()
    {
        return $this->AssortContent;
    }

    
    
}