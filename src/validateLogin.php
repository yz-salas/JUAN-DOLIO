<?php

// Inicio sesión
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mensaje = "";

    // Prepara la consulta SQL
    $stmt = $conn->prepare("SELECT ID, username, Password, level FROM users WHERE username = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincula el parámetro
    $stmt->bind_param("s", $username);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene el resultado
    $result = $stmt->get_result();

    // Valida los resultados
    if ($result->num_rows > 0) {
        // Convierte los datos a un array
        $user = $result->fetch_assoc();

        if ($password === $user["Password"]) {
            // Inicia la sesión y guarda los datos del usuario
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];

            // Redirige al usuario validado a la página principal
            header("Location: index.php");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta";
            header("Location: login.php?mensaje=" . urlencode($mensaje));
            exit();
        }
    } else {
        $mensaje = "No existe un usuario con ese nombre";
        header("Location: login.php?mensaje=" . urlencode($mensaje));
        exit();
    }
}

$conn->close();
