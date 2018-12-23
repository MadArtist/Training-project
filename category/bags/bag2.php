<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/db.php';
$db = db::getInstance();
$db = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Item-1</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/header.php' ?>

    <section class="item-page">
        <?php
            $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1'";

            $res = $db->query($query);
            $data = $res->fetch_all(MYSQLI_ASSOC);


        ?>
        <div class="product-img">
            <img src="/img/bag-1.png">
        </div>
        <div class="item-info">
            <h2>Item name</h2>
            <b class="price">$25.50</b>
            <div class="config">
                <?php if($data[0]['prd_is_config'] == true) {
                    $res = $db->query("SELECT * FROM training.products WHERE prd_conf_of = '" . $data['prd_id'] . "'");
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    foreach($data as $val) {
                        echo "<a href='{$val['prd_link']}'><div class='color {$val['prd_color']}'></div></a>";
                    }
                }

                    ?>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <a href="#" class="btn">Buy</a>
        </div>
        <div class="clearfix"></div>

    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/footer.html' ?>

</body>
</html>