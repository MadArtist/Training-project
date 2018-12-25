<?php


if(empty($_GET['page'])) {
    $_GET['page'] = '1';
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
$db = db::getInstance();
$db = $db->getConnection();

$catId = 1;
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php' ?>

    <section class="product-page">
        <div class="breadcrumbs">
            <p>Travel Bags</p>
        </div>
        <header class="cat_description">
            <hr>
            <h2>Travel Bags</h2>
            <p>
                <?php
                #$res = $db->query("SELECT cat_description FROM training.categories WHERE cat_name = 'Travel bags'");
                #echo CategoryList::getCategories()[$catId - 1]['cat_description'];#$res->fetch_assoc()['cat_description'];
                echo CategoryList::getCategories()[$_GET['cat' - 1]]['cat_description'];
                ?>
            </p>
            <hr>
        </header>
        <form class="sorting">
            <div class="per_page">
                <label for="items_per_page">Show N per page</label>
                <select name="per_page" id="items_per_page">
                    <?php
                    $res = $db->query("SELECT prd_per_page FROM training.config");
                    $data = $res->fetch_all();

                    foreach($data as $val) {
                        echo '<option value="' . $val[0] . '">' . $val[0] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="sort">
                <label for="sort">Sort by</label>
                <select name="sort" id="sort">
                    <option value="name_asc" selected="selected">Name: A-Z</option>
                    <option value="name_desc">Name: Z-A</option>
                    <option value="price_asc">Price: ascending</option>
                    <option value="price_desc">Price: descending</option>
                </select>
            </div>
            <input type="hidden" name="page" value="<?= $_GET['page']?>">
            <button type="submit">Apply</button>
        </form>
        <!-- Product list -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/categoryProducts.php'; ?>


        <!-- Page navigation -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'].'/nav.php' ?>
    </section>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/footer.html' ?>
