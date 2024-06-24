<?php
session_start();
include("config.php");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $gmail = $_POST["email"];
    $password = $_POST["password"];


    $stmt = $conn->prepare("INSERT INTO `users`(username, Gmail, Password) VALUES ('$username','$gmail','$password')");
    $stmt->execute();

    $user_id = mysqli_insert_id($conn); //obtiene el id del usuario recien engresado

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = '$user_id'"); // ejecuto la peticion
    $stmt->execute();
    $result = $stmt->get_result();

    $user = mysqli_fetch_assoc($result);

    if ($user["username"] === $username) {

        // iniciar la sesion y guardar sus datos para que pueda acceder a la pagina
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        //redirijo al usuario validado a la pagina proncipal
        header("Location: main.php");
        exit();
    } else {
        echo  "Error: " . $stmt . "<br>" . mysqli_error($conn);
    }
}

$conn->close();

/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
if (isset($_POST["btnSubmit"])) {
    $username = $_POST["username"];
    $gmail = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO users(username, Gmail, Password) VALUES ('$username','$gmail','$password')";
    $result = mysqli_query($conn, $sql);
}

$conn->close();

// Redirigir de vuelta al dashboard.php con mensajes en la URL
header("Location: index.php");
exit();
}

*/