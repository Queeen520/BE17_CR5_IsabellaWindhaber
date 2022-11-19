<?php
session_start();

require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
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
    $data = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $name = $data['name'];
        $located = $data['located'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $description = $data['description'];
        $breed = $data['breed'];
        $status = $data['status'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>

    <main class="p-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../pictures/<?php echo $picture; ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <h4 class='card-header text-center'><?php echo $name; ?></h4>
                    <div class='card-body p-2'>
                        <p class='card-text'><b> Breed: </b> <?php echo $breed; ?></p>
                        <p class='card-text'><b> Age: </b> <?php echo $age; ?></p>
                        <p class='card-text'><b> Size: </b> <?php echo $size; ?></p>
                        <p class='card-text'><b> Location: </b> <?php echo $located; ?></p>
                        <p class='card-text'><b> Vaccinated: </b> <?php echo $vaccinated; ?></p>
                        <p class='card-text'><?php echo $description; ?></p>
                    </div>
                    <div class='card-footer text-center'>
                       
                       <?php 
                       if ($status == 'Available')
                            echo 
                            "<div class='card-footer text-center'>
                            <a class='btn btn-small bg-success' href='adopt.php?id=".$id."'>
                            Take me Home</a>
                            </div>";
                            
                        else if ($status == 'Adopted')
                            echo 
                            "<div class='card-footer text-center bg-danger'>
                            <p class='h6'>Already Adopted</p>
                            </div>"
                        ?> 
                            </div>
                        </div>
                    </div>
                </div>
    </main>
</body>
</html>