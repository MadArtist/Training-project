<?php
/**
 * Created by PhpStorm.
 * User: mad_artist
 * Date: 24.12.18
 * Time: 17:32
 */

class Product
{

    public static function getData($category, $page = 1, $perPage = 3, $sort = 'name_asc')
    {
        $offset = ($page - 1) * $perPage;

        $query = "SELECT * FROM training.products WHERE ISNULL(prd_conf_of) AND cat_id = " . $category . " ";
        if ($sort === 'name_asc') {
            $query .= "ORDER BY prd_name ASC";
        } else if ($sort === 'name_desc') {
            $query .= "ORDER BY prd_name DESC";
        } else if ($sort === 'price_asc') {
            $query .= "ORDER BY prd_price ASC";
        } else if ($sort === 'price_desc') {
            $query .= "ORDER BY prd_price DESC";
        }

        $query .= " LIMIT " . $perPage . " OFFSET " . $offset;

        $db = db::getInstance()->getConnection();
        $res = $db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;

    }

    public static function getShortDesct($id) {
        $db = db::getInstance()->getConnection();
        $descrLenght = $db->query("SELECT max_descr_ch FROM training.config")->fetch_all(MYSQLI_ASSOC)[0]['max_descr_ch'];

        $data = $db->query("SELECT prd_description FROM training.products WHERE prd_id = "
            . $id)->fetch_all(MYSQLI_ASSOC)[0]['prd_description'];
        return substr($data, 0, $descrLenght);
    }




}

