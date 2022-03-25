
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


    // echo  "ggggg";
    $id = $_GET['edit'];

    $sql =  "SELECT * FROM projet WHERE matricule = '$id'";
    $result = $conn->query($sql);

if(isset($_POST['update'])){
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


    $insert = "UPDATE `projet` SET 
    `nom`='$product_name',
    `prenom`='$product_prenom' ,
    `date de naissance`='$product_date',
    `département`='$product_département', 
    `salaire`='$product_salaire',
    `fonction`='$product_fonction',
    `photo`='$product_image'
    WHERE matricule ='$id'";
    $upload=mysqli_query($conn,$insert);
    if($upload){
        move_uploaded_file($product_image_tmp_name,$product_image_folder);
        $message[]='new product added successfully';
    }else{
        $message[]='could not add the product';
    }


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
    <?php
            $row = $result->fetch_assoc();
                // echo "<tr><td>" . $row["matricule"]. "</td><td>" . $row["nom"]."</td><td>". $row["prenom"]."</td><td>". $row["date de naissance"]."</td><td>". $row["département"]."</td><td>". $row["salaire"]."</td><td>". 
                // $row["fonction"]. "</td><td>"  . "<a href='/' class='btn'>edit</a>" .  "</td><td>" ."<a class='btn' href='index.php?delete=".$row["matricule"]."'".">Delet</a>" ."</td></tr>";
                // $matricule = $row["matricule"];
                // $nom =$row["nom"];
                // $prenom =$row["prenom"];
                // $date= $row["date de naissance"];
                // $département=  ["département"];                 
                // $salaire=  ["salaire"];                 
                // $fonction=  ["fonction"];         
            
           

        
    ?>
    <div class="container">
    <form action=""  method="post" enctype="multipart/form-data">
        <h3>projet</h3>
        <label>matricule</label>
        <input type="text" name="product-matricule" class="box" value="<?php echo $row['matricule'];?>">
        <label>nom</label>
        <input type="text" placeholder="Entre nom"  name="product-name" class="box" value="<?php echo $row['nom'];?>">
        <label>prénom</label>
        <input type="text"placeholder="Entre prenom" name="product-prenom" class="box" value="<?php echo $row['prenom'];?>"><br><br>
        <label>date de naissance</label>
        <input type="date" name="product-date"  class="box" value="<?php echo $row['date de naissance'];?>"><br><br>
        <label>département</label>
        <input type="text" name="product-département" class="box" value="<?php echo $row['département'];?>"><br><br>
        <label>fonction</label>
        <input type="text" name="product-fonction" class="box" value="<?php echo $row['fonction'];?>"><br><br>
        <label>salaire</label>
        <input type="text" name="product-salaire"  class="box"value="<?php echo $row['salaire'];?>"><br><br>
        <input type="file" name="product-image" class="box" value="<?php echo $row['photo'];?>"><br><br>
        <input type="submit"  class="btn btn-primary" name="update" value="update">
    </form>
    </div>

</body>
</html>
