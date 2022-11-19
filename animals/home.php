<?php
session_start();
require_once '../components/db_connect.php';

/*
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../register.php");
    exit;
}

if (!isset($_SESSION['adm']) && isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
} else if (isset($_SESSION['adm']) && !isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['adm']);
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
}*/

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
        <div class='col p-3'>
            <div class='card p-0 shadow-lg bg-body rounded all-animals'>
                <img class='card-img-top' src='../pictures/" . $row['picture'] . "'alt='" . $row['name'] . "'>
                <h4 class='card-header text-center'>" . $row['name'] . "</h4>
                <div class='card-body p-2'>
                    <p class='h5 card-text text-center'>" . $row['breed'] . "</p>
                    <p class='card-text'>" . $row['status'] . "</p>
                    <p class='card-text'>" . $row['description'] . "</p>
                    <p class='h6'>
                    Age: " . $row['age'] . " years 
                    </p>
                    <p class='h6'>
                    Vaccination Status: " . $row['vaccinated'] . "
                    </p>
                </div>
                <div class='card-footer text-center'>
                   <a class='btn btn-small bg-info' href='details.php?id=" . $row['id'] . "'>Show Details</a>
                </div>
            </div>
        </div>";
    }
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="../dashboard.php"><button class='btn btn-success' type="button">Show my Profil</button></a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 cont">
            <?= $tbody; ?>
        </div>
    </div>
</body>
</html>