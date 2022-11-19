<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../pictures/" . $row['photo'] . "'</td>
            <td class='text-white'>" . $row['name'] . "</td>
            <td class='text-white'>" . $row['location'] . "</td>
            <td class='text-white text-center'>" . $row['description'] . "</td>
            <td class='text-white'>" . $row['size'] . "</td>
            <td class='text-white'>" . $row['age'] . "</td>
            <td class='text-white'>" . $row['vaccinated'] . "</td>
            <td class='text-white'>" . $row['breed'] . "</td>
            <td class='text-white'><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='details.php?id=" .$row['id']."'><button class='btn btn-info btn-sm ' type='button'>Details</button></a>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm m-1' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='12'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
            text-align: center;
        }
        body {
            background-image: url("https://images.unsplash.com/photo-1564349683136-77e08dba1ef7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8YW5pbWFsc3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="create.php"><button class='btn btn-primary' type="button">Add animals</button></a>
            <a href="../dashboard.php"><button class='btn btn-success' type="button">Dashboard</button></a>

        </div>
        <p class='h2 text-white'>Animals</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Age</th>
                    <th>Vaccinated</th>
                    <th>Breed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-dark ">
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
</html>