<?php

namespace Plugin\AssortContent\Entity;

class AssortContent extends \Eccube\Entity\AbstractEntity
{
    private $assort_id;

    private $name;
    
    private $image_file_name;
    
    public function __construct($name,$image_file_name){
        $this->name = $name;
        $this->image_file_name = $image_file_name;
    }

    public function getId()
    {
        return $this->assort_id;
    }

    public function setId($id)
    {
        $this->assort_id = $id;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setImageFileName($fileName)
    {
        $this->image_file_name = $fileName;

        return $this;
    }

    public function getImageFileName()
    {
        return $this->image_file_name;
    }
    
}