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
    $fk_animal = $_POST['fk_animal'];

    $sql = "INSERT INTO pet_adoption (fk_user, fk_pet) VALUES ($fk_user, $fk_animal)";
    $result = mysqli_query($connect, $sql);

    $sql2 = "UPDATE animals SET status = 'Adopted' WHERE id = {$fk_animal}";
    $res2 = mysqli_query($connect, $sql2);

    if ($result === true and $res2 === true) {
        $class = "success";
        $message = "Congratulations," . $row1['first_name'] . " " . $row1['last_name'] . "!<br>
            Youre adoption was successfull ! ";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
};


?>