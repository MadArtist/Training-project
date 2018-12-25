<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
$db = db::getInstance();
$db = $db->getConnection();
?>

    <header class="index-header">
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/header.php' ?>

        <div class="best-wrapper">
            <div class="best">
                <h2>Best Travel</h2>
                <h2>ACCESSORIES</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                <a class="btn" href="#">VIEW ALL</a>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="popular">
            <h1>MOST POPULAR</h1>
            <p class="pop-descr">It is a long established fact that a reader will be distracted
                by the readable content of a page when looking at its layout.</p>
            <div class="popular-wrap">
            <?php
            $que = $db->query("SELECT max_descr_ch FROM training.config");
            $descrLenght = $que->fetch_all(MYSQLI_ASSOC)[0]['max_descr_ch'];


            $query = "SELECT * FROM training.products WHERE ISNULL(prd_conf_of) LIMIT 6";
            $res = $db->query($query);
            $data = $res->fetch_all(MYSQLI_ASSOC);
            foreach($data as $j) {
                $shortDescr = substr($j['prd_description'], 0, $descrLenght);
                echo <<<EOT
            <div class="item">
                            <div class="item-wrapper"
                                <a href="{$j['prd_link']}">
                                    <img src="{$j['prd_img']}" class="item-img" alt="">
                                </a>
                
                                <br>
                                <a href="{$j['prd_link']}">{$j['prd_name']}</a>
                                <p class="prod_description">{$shortDescr}...</p>
                                <div class="price">
                                    <b>{$j['prd_price']}</b>
                                    <a href="/new-order.php?buy={$j['prd_id']}"><img src="/img/shopping-cart.png" alt=""></a>
                                </div>
                            </div>
                        </div>
EOT;
            }
            ?>
            </div>

        </div>
    </div>


    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/footer.html' ?>

</body>
</html>