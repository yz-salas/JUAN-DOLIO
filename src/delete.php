<?php
include("config.php");
header('Content-Type: application/json');

if (isset($_GET["ID"]) && isset($_GET["imageName"])) {
  $id = $_GET["ID"];
  $imageName = urldecode($_GET["imageName"]);

  // Asegúrate de que $id sea un número entero válido
  if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    echo json_encode(['success' => false, 'error' => 'ID inválido.']);
    exit();
  }

  $imagePath = "../assets/imgbasedata/" . $imageName;

  // Verificar que la imagen existe y eliminarla
  if (file_exists($imagePath)) {
    if (unlink($imagePath)) {
      // Eliminar la entrada de la base de datos
      $sqlDelete = "DELETE FROM imagenes WHERE ID=$id";
      if (mysqli_query($conn, $sqlDelete)) {
        echo json_encode(['success' => true]);
      } else {
        echo json_encode(['success' => false, 'error' => 'No se pudo eliminar la entrada de la base de datos.']);
      }
    } else {
      echo json_encode(['success' => false, 'error' => 'No se pudo eliminar la imagen del servidor.']);
    }
  } else {
    echo json_encode(['success' => false, 'error' => 'La imagen no existe o la ruta es inválida.']);
  }
} else {
  echo json_encode(['success' => false, 'error' => 'ID o nombre de imagen no especificado.']);
}
