<?php
session_start();
require_once "../components/db_connect.php";
if(!isset($_SESSION['user'])&&!isset($_SESSION['adm'])){
    header('location: ../index.php');
}
if(isset($_SESSION['user'])){
    header('location: ../home.php');
}
if($_GET['id']){
  $id=$_GET['id'];
  $sql = "SELECT * FROM animals where id=$id";
  $result= mysqli_query($connect,$sql);
  if(mysqli_num_rows($result)==1){
    $data = mysqli_fetch_assoc($result);
    $name=$data['name'];
    $location=$data['location'];
    $photo=$data['photo'];
    $description = $data['description'];
    $size=$data['size'];
    $age=$data['age'];
    $vaccinated=$data['vaccinated'];
    $breed=$data['breed'];
  }else {
    header("location: error.php");
  }
} else {
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Animal</title>
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
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $photo ?>' ></legend>
            <form action="actions/a_update.php" method="post" enctype="multipart/form-data" >
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td><input class="form-control" type="text"  name="name" placeholder ="Name" value="<?php echo $name ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td><input class="form-control" type="text"  name="location" placeholder ="Location" value="<?php echo $location ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><input class="form-control" type= "number" name="age" step="any"  placeholder="Age" value ="<?php echo $age ?>" /></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><input class="form-control" type= "text" name="vaccinated" step="any"  placeholder="Vaccinated" value ="<?php echo $vaccinated ?>" /></td>
                    </tr>
                    <tr>
                        <th>Breed</th>
                        <td><input class='form-control' type="text" name= "breed" placeholder="Breed" step="any" value="<?php echo $breed ?>"/></td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td><input class="form-control" type= "text" name="size" step="any"  placeholder="Size" value ="<?php echo $size ?>" /></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input class="form-control" type= "text" name="description" step="any"  placeholder="Description" value ="<?php echo $description ?>" /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="photo" /></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $id ?>" />
                        <input type= "hidden" name= "photo" value= "<?php echo $photo ?>" />
                        <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>



