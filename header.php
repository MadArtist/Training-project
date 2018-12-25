<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/CategoryList.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Veltry</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header class="common-header">
    <div class="header-container">
        <div class="logo">
            <a href="/index.php"><img src="/img/logo.png" alt="Veltry"></a>
        </div>
        <div class="header-icons">
            <a href="/login.php"><img src="/img/search-header.png" class="head-icon" alt="search"></a>
            <a href="#"><img src="/img/shopping-cart-header.png" class="head-icon" alt="shop"></a>
        </div>
        <ul class="main-menu">
            <?php
                foreach($data = CategoryList::getCategories() as $val) {
                    echo "<li><a href='{$val['cat_link']}'>{$val['cat_name']}</a></li>";
                }
            ?>
        </ul>
    </div>
</header>
