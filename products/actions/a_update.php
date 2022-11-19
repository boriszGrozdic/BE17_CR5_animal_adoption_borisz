
<?php
session_start();
require_once "../../components/db_connect.php";
require_once "../../components/file_upload.php";
if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../../home.php');
}
if($_POST){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $breed = $_POST['breed'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $picture = file_upload($_FILES['photo'],'animal');
    if($picture->error == 0){
        ($picture=='Animal_diversity.png' ?: unlink("../../pictures/$_POST[picture]"));
        $sql="UPDATE  animals SET name='$name',location='$location',picture='$picture->fileName',age=$age,vaccinated='$vaccinated',breed='$breed',description='$description',size='$size'  WHERE id=$id";
     } else {
        $sql="UPDATE  animals SET name='$name',location='$location',age=$age,vaccinated='$vaccinated',breed='$breed',description='$description',size='$size'  WHERE id=$id";
     }
    if(mysqli_query($connect,$sql)){
        $class="success";
        $message="You edit animals successfully";
    } else {
        header("location: ../error.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="alert alert-<?= $class?>" role="alert">
                <p><?=$message?></p>
                <a href='../update.php?id=<?= $id ?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>