<?php
// Inicia la sesión si no está iniciada
session_start();

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio o a donde prefieras
header("Location: index.php");
exit();
