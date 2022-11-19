<?php
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $picture = $data['photo'];
        $name = $data['name'];
        $location = $data['location'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $breed = $data['breed'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Details of a Animal <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="details.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><?php echo $name ?></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><?php echo $location ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $description ?></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><?php echo $size ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $age ?></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><?php echo $vaccinated ?></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><?php echo $breed ?></td>
                    </tr>
                    
                    <tr>
                        
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back to main page</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>