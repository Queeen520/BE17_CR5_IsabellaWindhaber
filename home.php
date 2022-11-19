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

$firstname = $row['first_name'];
$lastname = $row['last_name'];
$phone = $row['phone_number'];
$address = $row['address'];
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

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="animals/home.php">
    <img src="pictures/animal.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
    Pet Adoption</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
    <a class="nav-link text-center" href="#">Logged in as <?php echo $row['first_name'] . " " . $row['last_name'] ;?></a>
    </li>
    </ul>
  </div>
</nav>

<div class="d-flex justify-content-center mb-2">
        <a class="btn btn-outline-primary ms-3" href="animals/home.php">Show All Animals</a>
            <a class="btn btn-outline-primary ms-3" href="animals/seniors.php">Show Seniors</a>
                <a class="btn btn-outline-primary ms-3" href="logout.php?logout">Log Out</a>
</div>

    <div class="container py-5 h100">
        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-5">
                    <div class="card-body text-center">
                        <img src="pictures/<?= $pic ?>" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-4">Hi, <?= $firstname ?></h5>
                        <div class="d-flex justify-content-center mb-3">
                            <a class=" btn btn-primary ms-1" href="update.php?id=<?= $_SESSION['user'] ?>">Update your profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
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