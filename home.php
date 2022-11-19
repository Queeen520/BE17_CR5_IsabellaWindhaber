<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['adm'])) {
    header('Location: dashboard.php');
    exit;
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$query = "SELECT * FROM users WHERE id={$_SESSION['user']}";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$email = $row['email'];
$pic = $row['picture'];
$status = $row['status'];

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?= $firstname ?></title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <div class="container py-5 h100">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="pictures/<?= $pic ?>" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-4">Hi, <?= $firstname ?></h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a class=" btn btn-primary ms-1" href="update.php?id=<?= $_SESSION['user'] ?>">Update your profile</a>
                            <a class="btn btn-outline-primary ms-1" href="logout.php?logout">Log Out</a>
                            <a class="btn btn-outline-danger ms-1" href="hotels/index_user.php">Hotels</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-body ">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $firstname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Lastname</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $lastname ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone Number</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $phone ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $email ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $status ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>