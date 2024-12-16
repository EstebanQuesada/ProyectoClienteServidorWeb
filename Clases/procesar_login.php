<?php 
include("Config.php");

session_start();

if (!empty($_POST)) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `user` WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($password == $row["password"]) { 
                $_SESSION["username"] = $row["username"];
                $_SESSION["rol"] = $row["rol"];
                header("Location: ../Views/Index.php"); 
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
            }
        }
    } else {
        echo "<script>alert('Usuario no encontrado'); window.history.back();</script>";
    }
    $stmt->close();
}
?>
