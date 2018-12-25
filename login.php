<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Db.php';

session_start();

$db = db::getInstance();
$db = $db->getConnection();

if(!empty($_POST['login'])) {
    $query = "SELECT pass FROM training.users WHERE login = '{$_POST['login']}'";
    $res = $db->query($query);
}

if(!empty($_POST['login'])) {
    if ($_POST['login'] === 'admin' && password_verify($_POST['password'], $res->fetch_assoc()['pass']) ) {
        $_SESSION['logined'] = 'True';
        header("Location: admin.php");
    } else {
        echo 'Fuck';
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>

    <section class="login">
        <form action="" method="post">
            <label for="login">Name:</label><br>
            <input type="text" id="login" name="login"><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>

            <button type="submit">Login</button>
        </form>
    </section>
</body>
</html>