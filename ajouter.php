<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$mysqli=new mysqli('localhost','root','','employee') or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
    // $name= $_POST['name'];
    // $location =$_POST['location'];
    // $mysqli->query("INSERT INTO data(name,location) VALUES ('$name','$location')")or
    // die($mysqli->error);
}
if(isset($_GET['delete'])){
    echo "skdsdk";
    $id=  $_GET['delete'];
    $mysqli->query("DELETE FROM projet WHERE id= $id");
    // $_SESSION['message'] ="Record has been deleted";
    // $_SESSION['msg_type'] ="danger";
    // header("location:index.php");
}

if(isset($_POST['add-product'])){
    $product_matricule=$_POST['product-matricule'];
    $product_name=$_POST['product-name'];
    $product_prenom=$_POST['product-prenom'];
    $product_date=$_POST['product-date'];
    $product_département=$_POST['product-département'];
    $product_fonction=$_POST['product-fonction'];
    $product_salaire=$_POST['product-salaire'];
    $product_image=$_FILES['product-image']['name'];
    $product_image_tmp_name=$_FILES['product-image']['tmp_name'];
    $product_image_folder='uploaded_img/'.$product_image;


    $insert = "INSERT INTO projet(`matricule`, `nom`, `prenom`, `date de naissance` , `département`, `salaire`, `fonction`, `photo`) VALUES ('$product_matricule','$product_name','$product_prenom','$product_date','$product_département','$product_salaire','$product_fonction','$product_image')";

    $upload=mysqli_query($conn,$insert);
    if($upload){
        move_uploaded_file($product_image_tmp_name,$product_image_folder);
        $message[]='new product added successfully';
    }else{
        $message[]='could not add the product';
    }
    header("location:index.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="ajouter.php" method="post" enctype="multipart/form-data">
        <h3>projet</h3>
        <div class="from-groupe">
        <label>matricule</label>
        <input type="text" name="product-matricule" class="box">
        </div>
        <div class="from-groupe">
        <label>nom</label>
        <input type="text" placeholder="Entre nom" name="product-name" class="box">
        </div>
        <div class="from-groupe">
        <label>prénom</label>
        <input type="text"placeholder="Entre prenom" name="product-prenom" class="box">
        </div>
        <div class="from-groupe">
        <label>date de naissance</label>
        <input type="date" name="product-date" class="box">
        </div>
        <div class="from-groupe">
        <label>département</label>
        <input type="text" name="product-département" class="box">
        </div>
        <div class="from-groupe">
        <label>fonction</label>
        <input type="text" name="product-fonction" class="box">
        </div>
        <div class="from-groupe">
        <label>salaire</label>
        <input type="text" name="product-salaire" class="box">
        <div class="from-groupe">
        <input type="file" accept="image/png,image/jpeg,image/jpg" name="product-image" class="box">
        </div>
        <div class="from-groupe">
        <input type="submit"  class="btn btn-primary "name="add-product" value="submit">
        </div>
    </form>
</div>
    <?php
    $select = mysqli_query($conn,"SELECT * FROM projet");
    ?>
    
    
</body>
</html>
