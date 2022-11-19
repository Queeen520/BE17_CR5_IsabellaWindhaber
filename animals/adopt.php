<?php
session_start();

require '../components/db_connect.php';

if (!isset($_SESSION['adm']) && isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM users WHERE id = $_SESSION[user]");
    $row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
} else if (isset($_SESSION['adm']) && !isset($_SESSION['user'])) {

    $res = mysqli_query($connect, "SELECT * FROM users WHERE id = $_SESSION[adm]");
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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<main class="p-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../pictures/<?echo $picture; ?>" class="img-fluid rounded-start" alt="<?php echo $name; ?>">
                </div>
                <div class="col-md-8">
                    <div class='card-header text-center'>
                        <form action="a_adopt.php" method="POST" enctype="multipart/form-data">
                            <tr>
                                <p class="h2">Do you really want to adopt this pet?</p>
                                <input type="hidden" name="fk_user" value="<?php echo $row1['id'] ?>" />
                                <input type="hidden" name="fk_animal" value="<?php echo $id ?>" />
                                <td><button class='btn btn-success' type="submit">YES</button></td>
                                <td><a href="index.php"><button class='btn btn-danger' type="button">NO</button></a></td>
                            </tr>
                        </form>
                    </div>
                    <div class='card-body p-2'>
                        <p class='card-text'><b> Age: </b> <?php echo $age; ?></p>
                        <p class='card-text'><b> Size: </b> <?php echo $size; ?></p>
                        <p class='card-text'><b> Location: </b> <?php echo $location; ?></p>
                        <p class='card-text'><?=$description?></p>
                    </div>
                    <h4 class='card-footer text-center'>
                        <?php echo $breed . " called ".$name; ?>
                    </h4>
                </div>
            </div>
        </div>
    </main>

    </body>
</html>