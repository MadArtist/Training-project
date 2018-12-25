<?php
/**
 * Created by PhpStorm.
 * User: mad_artist
 * Date: 24.12.18
 * Time: 17:46
 */

class CategoryList
{
    public static function getCategories() {
        $db = db::getInstance()->getConnection();
        $res = $db->query("SELECT * FROM categories");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

}