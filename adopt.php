<?php
session_start();

require 'components/db_connect.php';

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<body>
    <header>
        <div class="hero p-5">
            <h3>
                Welcome, <?php echo $row1['first_name'] . " " . $row1['last_name'] ?>!
            </h3>
            <h1 class="text-center">
                <?php echo $name . " - " . $breed; ?>
            </h1>
        </div>
    </header>


    </body>
</html>