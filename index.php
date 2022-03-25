<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
$conn = new mysqli($servername, $username, $password, $dbname);// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql =  "SELECT * FROM projet";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "    <table class='table table-dark'>
        <tr>
        <th>matricule</th>
        <th>nom</th>
        <th>prénom</th>
        <th>date de naissance</th>
        <th>département</th>
        <th>salaire</th>
        <th>fonction</th>  
        <th>photo</th>  
        </tr>";

       
     
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["matricule"]. "</td><td>" . $row["nom"]."</td><td>". $row["prenom"]."</td><td>". $row["date de naissance"]."</td><td>". $row["département"]."</td><td>". $row["salaire"]."</td><td>". 
            $row["fonction"]. "</td><td>" ."<img src='uploaded_img/".$row["photo"]. "' height='100'></td><td>"  . "<a class='btn btn-primary' href='update.php?edit=".$row["matricule"]."'".">edit</a>" .  "</td><td>" ."<a class='btn btn-danger' href='index.php?delete=".$row["matricule"]."'".">Delet</a>" ."</td></tr>";
    
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
    if(isset($_GET['delete'])){
            
        $id=  $_GET['delete'];
        $conn->query("DELETE FROM projet WHERE matricule = '$id'");
        $_SESSION['message'] ="Record has been deleted";
        $_SESSION['msg_type'] ="danger";
        header("location:index.php");
    }
    if(isset($_GET['edit']))
    $conn->close();
    ?>
    
    <?php
    ?>

    <a href="ajouter.php">
        <button class="btn btn-warning">
            Ajouter un nouvel employé
        </button>
    </a>
    

</body>
</html>