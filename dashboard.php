<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$status = 'adm';
$sql = "SELECT * FROM users WHERE status != '$status'";
$result = mysqli_query($connect, $sql);
$tbody = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "
            <tr>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
            <td>" . $row['phone_number'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>
            <a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primar btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='9'><center>No Data Available </center></td></tr>";
}
/* IS NOT WORKING CORRECT
$sql1 = "SELECT * FROM animals";
$res = mysqli_query($connect, $sql1);
$tbody_animals = '';
if ($res->num_rows > 0) {
    while ($row1 = $res->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "
            <tr>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row1['picture'] . "' alt=" . $row1['name'] . "></td>
            <td>" . $row1['name'] . " " . $row1['breed'] . "</td>
            <td>" . $row1['size'] . "</td>
            <td>" . $row1['email'] . "</td>
            <td>
            <a href='update.php?id=" . $row1['id'] . "'><button class='btn btn-primar btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" . $row1['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='9'><center>No Data Available </center></td></tr>";
}
*/
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi, Administrator</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
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

        .userImage {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 my-4">
                <div class="card-body text-center">
                    <img src="pictures/admavatar.png" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-4">Administrator</h5>
                    <div class="d-flex justify-content-center mb-2">
                        <a class="btn btn-outline-primary ms-1" href="logout.php?logout">Log Out</a>
                        <a class="btn btn-success ms-1" href="animals/index.php">Update Animals</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 mt-2">
                <p class='h2'>Users</p>
                <table class='table align-middle mb-0 bg-white'>
                    <thead class='table-light'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>