<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
$db = db::getInstance();
$db = $db->getConnection();
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php' ?>

    <section class="item-page">
        <!-- Query product data from db -->
        <?php

        if( !empty($_GET['color']) ) {
            if($_GET['color'] == 'yellow') {
                $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1-yellow'";
            } else if($_GET['color'] == 'red') {
                $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1-red'";
            } else if($_GET['color'] == 'brown') {
                $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1-brown'";
            } else if($_GET['color'] == 'green') {
                $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1-green'";
            }
        } else {
            $query = "SELECT * FROM training.products WHERE prd_name = 'Bag1'";
        }
        $res = $db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        ?>
        <div class="product-img">
            <img src="<?= $data[0]['prd_img'] ?>" class="item-page-img">
        </div>
        <div class="item-info">
            <h2><?= $data[0]['prd_name'] ?></h2>
            <b class="price">$<?= $data[0]['prd_price'] ?></b>
            <div class="config">
                <!-- Config -->
                <?php

                if($data[0]['prd_conf_of']) {
                    $res = $db->query("SELECT * FROM training.products WHERE prd_conf_of = '"
                        . $data[0]['prd_conf_of'] . "'");

                    $data = $res->fetch_all(MYSQLI_ASSOC);
                    foreach ($data as $val) {
                        echo "<a href='{$val['prd_link']}'><div class='color {$val['prd_color']}'></div></a>";
                    }
                }
                ?>
            </div>
            <p><?= $data[0]['prd_description'] ?></p>
            <a href="/new-order.php?buy=<?=$data[0]['prd_id']?>" class="btn">Buy</a>
        </div>
        <div class="clearfix"></div>

    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.html' ?>

</body>
</html>