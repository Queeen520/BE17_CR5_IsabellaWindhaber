<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM users WHERE id = $_SESSION[user]");
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);

} else if (isset($_SESSION['adm']) && !isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM user WHERE id = $_SESSION[adm]");
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

mysqli_close($connect);

if ($_POST) {
    $fk_user = $_POST['fk_user'];
    $fk_pet = $_POST['fk_pet'];
    $a_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO adoption (a_date, fk_user, fk_pet) VALUES ('$a_date', $fk_user, $fk_pet)";
    $result = mysqli_query($connect, $sql);
    $sql3 = "UPDATE animals SET status = 0 WHERE id = {$fk_pet}";
    $res3 = mysqli_query($connect, $sql3);
}

?>