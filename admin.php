<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';

session_start();

if( isset($_GET['do']) && $_GET['do'] === 'exit' ) unset($_SESSION['logined']);

if( !isset($_SESSION['logined']) ) die("You're not authorized");

$db = db::getInstance();
$db = $db->getConnection();

# Delete order
if( isset($_GET['delete']) ) {
    $db->query("DELETE FROM training.orders WHERE order_id = " . $_GET['delete']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>

    <section class="admin">
        <a href="admin.php?do=exit">Logout</a>
        <table class="orders">
            <th>Order id</th>
            <th>Product id</th>
            <th>Product price</th>
            <th>Order time</th>
        <?php
        $query = "SELECT * FROM training.orders";
        $res = $db->query($query);
        $data = $res->fetch_all(MYSQLI_ASSOC);

        foreach($data as $val) {
            echo '<tr>';
            echo "<td>{$val['order_id']}</td><td>{$val['prd_id']}</td><td>{$val['prd_price']}</td>
                  <td>{$val['order_time']}</td><td><a href='?delete={$val['order_id']}'>DELETE</a></td>";
            echo '</tr>';
        }
        ?>
        </table>

    </section>

</body>
</html>