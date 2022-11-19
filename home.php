<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img style='height:100px; width:100px;' class='img-thumbnail' src='pictures/" . $row1['photo'] . "'</td>
            <td>" . $row1['name'] . "</td>
            <td>" . $row1['location'] . "</td>
            <td>" . $row1['description'] . "</td>
            <td>" . $row1['size'] . "</td>
            <td>" . $row1['age'] . "</td>
            <td>" . $row1['vaccinated'] . "</td>
            <td>" . $row1['breed'] . "</td>
            <td>
            <a href='./products/details.php?id=" .$row1['id']."'><button class='btn btn-info btn-sm ' type='button'>Details</button></a>
            </td>
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
    <title>Welcome - <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .userImage {
            width: 150px;
            height: 150px;
            border-radius: 20%;
        }
        a {
            text-decoration: none;
            color: black;
            
        }
    </style>
</head>

<body>
    <div class="container d-flex">
        <div class="hero ">
            <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
        </div>
        <div class="m-3">
            <p class="text-dark">Hi <?php echo $row['first_name']; ?></p>
            <div>
                <a href="logout.php?logout">Sign Out</a>
            </div>
            
            <a href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
            <a  href="seniors.php"><button style="margin-left: 20rem;" class='btn btn-dark' type="button">Show Senior Animals</button></a>
        </div>
    </div>
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
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
</body>
</html>