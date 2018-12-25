<?php


if(empty($_GET['page'])) {
    $_GET['page'] = '1';
}
if(empty($_GET['sort'])) {
    $_GET['sort'] = 'name_asc';
}
if(empty($_GET['per_page'])) {
    $_GET['per_page'] = '3';
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/ProductList.php';
$db = db::getInstance();
$db = $db->getConnection();

?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php' ?>

    <section class="product-page">
        <div class="breadcrumbs">
            <p><?= CategoryList::getCategories()[$_GET['cat'] - 1]['cat_name']; ?></p>
        </div>
        <header class="cat_description">
            <hr>
            <h2><?= CategoryList::getCategories()[$_GET['cat'] - 1]['cat_name']; ?></h2>
            <p>
                <?= CategoryList::getCategories()[$_GET['cat'] - 1]['cat_description']; ?>
            </p>
            <hr>
        </header>
        <!-- Product sorting & display N per page -->
        <form class="sorting">
            <input type="hidden" name="cat" value="<?= $_GET['cat']?>">
            <div class="per_page">
                <label for="items_per_page">Show N per page</label>
                <select name="per_page" id="items_per_page">
                    <?php
                    $res = $db->query("SELECT prd_per_page FROM training.config");
                    $data = $res->fetch_all();

                    foreach($data as $val) {
                        echo '<option value="' . $val[0] . '"';
                        if($_GET['per_page'] == $val[0])
                            echo ' selected="selected"';
                        echo '>' . $val[0] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="sort">
                <label for="sort">Sort by</label>
                <select name="sort" id="sort">
                    <option value="name_asc"
                            <?php if($_GET['sort'] == 'name_asc'): ?>selected="selected"<?php endif;?>
                    >Name: A-Z</option>
                    <option value="name_desc"
                            <?php if($_GET['sort'] == 'name_desc'): ?>selected="selected"<?php endif;?>
                    >Name: Z-A</option>
                    <option value="price_asc"
                            <?php if($_GET['sort'] == 'price_asc'): ?>selected="selected"<?php endif;?>
                    >Price: ascending</option>
                    <option value="price_desc"
                            <?php if($_GET['sort'] == 'price_desc'): ?>selected="selected"<?php endif;?>
                    >Price: descending</option>
                </select>
            </div>
            <input type="hidden" name="page" value="1">

            <button type="submit">Apply</button>
        </form>
        <!-- Product list -->
        <div class="products">
            <?php foreach( $data = ProductList::getData($_GET['cat'], $_GET['page'], $_GET['per_page'], $_GET['sort']) as $val ): ?>
            <div class="item">
                <div class="item-wrapper">
                    <a href="<?=$val['prd_link']?>">
                        <img src="<?=$val['prd_img']?>" class="item-img" alt="">
                    </a>

                    <br>
                    <a href="<?=$val['prd_link']?>"><?=$val['prd_name']?></a>
                    <p class="prod_description"><?=ProductList::getShortDesct($val['prd_id'])?>...</p>
                    <div class="price">
                        <b><?=$val['prd_price']?></b>
                        <a href="/new-order.php?buy=<?=$val['prd_id']?>"><img src="/img/shopping-cart.png" alt=""></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <!-- Page navigation -->
        <footer class="nav">
            <ul class='navigation'>
                <?php
                $db = db::getInstance()->getConnection()->query(
                    "SELECT prd_id FROM training.products WHERE cat_id = " . $_GET['cat']);
                $numPage = $db->num_rows / $_GET['per_page'];

                for($i = 0; $i < $numPage; $i++) {
                    $p = $i + 1;
                    echo "<li><a href='?cat={$_GET['cat']}&per_page={$_GET['per_page']}&sort={$_GET['sort']}&page={$p}' ";
                    if($_GET['page'] == $p)
                        echo 'class="active-page"';
                    echo ">{$p}</a></li>";
                }
                ?>
            </ul>
        </footer>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.html' ?>
