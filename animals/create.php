<?php

require_once '../components/db_connect.php';
/*session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}*/
//$suppliers = "";
//$result = mysqli_query($connect, "SELECT * FROM hotels");

/*while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $hotels .=
        "<option value='{$row['supplierId']}'>{$row['sup_name']}</option>";
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add New Hotel</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add New Hotel</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Hotel Name" /></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><input class='form-control' type="text" name="city" placeholder="City" step="any" /></td>
                </tr>
                <tr>
                <tr>
                    <th>Stars</th>
                    <td><input class='form-control' type="number" name="stars" placeholder="Stars" step="any" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <!--<tr>
                    <th>Supplier</th>
                    <td>
                        <select class="form-select" name="supplier" aria-label="Default select example">
                            <?php //echo $suppliers; ?>
                            <option selected value='none'>Undefined</option>
                        </select>
                    </td>
                </tr>-->
                <tr>
                    <td><button class='btn btn-success' type="submit">Add Hotel</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>