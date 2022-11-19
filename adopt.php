<?php
session_start();

require 'components/db_connect.php';
if (!isset($_SESSION['adm']) && isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
} else if (isset($_SESSION['adm']) && !isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['adm']);
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
}


if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $breed = $data['breed'];
        $size = $data["size"];
        $location = $data["location"];
        $description = $data["description"];
        $hobby = $data["hobby"];
        $age = $data["age"];
        $status = $data["status"];
        $picture = $data["picture"];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>