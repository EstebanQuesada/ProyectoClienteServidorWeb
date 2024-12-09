<?php 
include("Config.php");

session_start();

if(!empty($_POST)){

    $sql = "SELECT * FROM `user` where username = '".$_POST["username"]."'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if(password_verify($_POST['password'],$row["password"])){
                $_SESSION["username"] = $row["username"];
                $_SESSION["rol"] = $row["rol"];
                header("Location: Index.php");
            } else {
                echo "Usuario o password no existe";
            }
        }
    } 
    

    //$_SESSION["username"] = $_POST["username"];


    //header('Location: index.php');
}


