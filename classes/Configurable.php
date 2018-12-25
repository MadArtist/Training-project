<?php
/**
 * Created by PhpStorm.
 * User: mad_artist
 * Date: 24.12.18
 * Time: 17:32
 */

class Configurable extends Product
{
    private $color;
    private $size;
    protected $price;

    public function __construct($id, $color, $size = null) {
        parent::__construct($id);
        $this->size = $size;
        $this->color = $color;
    }

    public function setData() {
        parent::setData();
        $query = "SELECT price FROM training.conf_prod WHERE conf_of = " . $this->id .
            " AND color = '" . $this->color . "' AND `size` = '" . $this->size . "'";
        $res = Db::getInstance()->getConnection();
        $data = $res->query($query)->fetch_all(MYSQLI_ASSOC);
        $this->price = $data[0]['price'];
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getConfSize()
    {
        $query = "SELECT DISTINCT `size` FROM training.conf_prod WHERE conf_of = " . $this->id;
        $res = Db::getInstance()->getConnection();
        $data = $res->query($query)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function getConfColor()
    {
        $query = "SELECT DISTINCT color FROM training.conf_prod WHERE conf_of = " . $this->id;
        $res = Db::getInstance()->getConnection();
        $data = $res->query($query)->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

}