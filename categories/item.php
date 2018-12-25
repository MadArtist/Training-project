<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Product.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Configurable.php';
$db = db::getInstance()->getConnection();
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php' ?>

    <section class="item-page">

        <!-- Query product data from db -->
        <?php
        if(empty($_GET['color']))
            $prod = new Product($_GET['id']);
        else
            $prod = new Configurable($_GET['id'], $_GET['color'], $_GET['size']);
        $prod->setData();
        ?>
        <div class="product-img">
            <img src="<?= $prod->getImg() ?>" class="item-page-img">
        </div>
        <div class="item-info">
            <h2><?php echo $prod->getName(); if ($prod instanceof Configurable) echo ' ' . $_GET['color'] . ', ' . $_GET['size'] ?></h2>
            <b class="price">$<?= $prod->getPrice() ?></b>
            <div class="config">
                <!-- Config -->
                <?php if ($prod instanceof Configurable):?>
                    <form method="get">
                    <input type="hidden" name="id" value="<?= $_GET['id']?>">
                    <label for="color">Color: </label>
                    <select name="color" id="color">
                        <?php
                        foreach ($data = $prod->getConfColor() as $val) {
                                echo "<option value='{$val['color']}'";
                                if($_GET['color'] == $val['color'])
                                    echo ' selected="selected"';
                                echo ">{$val['color']}</option>";
                            }

                        ?>

                    </select>
                    <label for="size">Size: </label>
                    <select name="size" id="size">
                        <?php
                            foreach ($data = $prod->getConfSize() as $val) {
                                echo "<option value='{$val['size']}'";
                                if($_GET['size'] == $val['size'])
                                    echo ' selected="selected"';
                                echo ">{$val['size']}</option>";
                            }
                        ?>
                    </select>
                    <button type="submit">Ok</button>
                </form>
                <?php endif; ?>
            </div>
            <p><?= $prod->getDescr() ?></p>
            <a href="/new-order.php?buy=<?=$_GET['id']?>" class="btn">Buy</a>
        </div>
        <div class="clearfix"></div>

    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.html' ?>