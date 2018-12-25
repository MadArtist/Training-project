<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';
$db = db::getInstance();
$db = $db->getConnection();

if(!empty($_GET['buy'])) {
    $getPrice = $db->query("SELECT prd_price FROM training.products WHERE prd_id = " . $_GET['buy']);
    $price = $getPrice->fetch_all(MYSQLI_ASSOC)[0]['prd_price'];
    $db->query("INSERT INTO training.orders(prd_id, prd_price) VALUES (" . $_GET['buy'] . ", " . $price . ")");
    header("Location: new-order.php");
}

?>


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/header.php' ?>

    <div class="content">

        <h1 style="text-align: center">Order added</h1>

    </div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/footer.html' ?>
