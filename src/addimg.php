<?php
// Conexión a la base de datos (debes configurar tus credenciales adecuadamente)
include("config.php");

if (isset($_POST["btnsubmit"])) {
  $message = '';
  $message_type = '';

  // Verificar si se ha seleccionado un archivo
  if ($_FILES["fileInput"]["error"] == UPLOAD_ERR_OK) {
    $desc = $_POST["nameInput"];
    $tmp_name = $_FILES["fileInput"]["tmp_name"];
    $name = basename($_FILES["fileInput"]["name"]);

    // Mover el archivo a la carpeta deseada
    $upload_dir = "C:\\wamp64\\www\\delfinesaquapark\\assets\\imgbasedata\\"; // Ruta donde se guardarán los archivos
    $target_file = $upload_dir . $name;

    if (move_uploaded_file($tmp_name, $target_file)) {
      // Guardar la ruta de la imagen en la base de datos
      $sql = "INSERT INTO imagenes (Name, Description) VALUES ('$name', '$desc')";
      if ($conn->query($sql) === TRUE) {
        $message = "Imagen subida y registrada en la base de datos correctamente.";
        $message_type = "success";
      } else {
        $message = "Error al registrar la imagen en la base de datos: " . $conn->error;
        $message_type = "error";
      }
    } else {
      $message = "Error al mover el archivo.";
      $message_type = "error";
    }
  } else {
    $message = "Error al subir la imagen.";
    $message_type = "error";
  }

  $conn->close();

  // Redirigir de vuelta al dashboard.php con mensajes en la URL
  header("Location: dashboard.php?message=" . urlencode($message) . "&type=" . urlencode($message_type));
  exit();
}
