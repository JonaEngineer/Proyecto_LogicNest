<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    // Verificar si el usuario y contraseña coinciden con un registro en la base de datos
    $check_query = "SELECT * FROM users WHERE userName='$userName' AND userPassword='$userPassword'";
    $result = $conn->query($check_query);
    if ($result->num_rows == 1) {
        // Usuario y contraseña válidos, iniciar sesión
        $_SESSION['userName'] = $userName;
        header("Location: ../index.html"); // Redirigir a la página de inicio del usuario
    } else {
        // Usuario o contraseña incorrectos, mostrar mensaje de error
        echo "Usuario o contraseña incorrectos";
    }
}
?>
