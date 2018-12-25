<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Configurable.php';

class Product
{
    protected $id;
    protected $name;
    protected $img;
    protected $descr;
    protected $price;

    public function __construct($id) {

        $this->id = $id;
    }

     public function setData() {
        $query = "SELECT prd_name, prd_img, prd_description, prd_price FROM training.products WHERE prd_id = " . $this->id;
        $res = Db::getInstance()->getConnection();
        $data = $res->query($query)->fetch_all(MYSQLI_ASSOC);
        $this->name = $data[0]['prd_name'];
        $this->img = $data[0]['prd_img'];
        $this->descr = $data[0]['prd_description'];
        $this->price = $data[0]['prd_price'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getDescr()
    {
        return $this->descr;
    }

    public function getPrice()
    {
        return $this->price;
    }

}