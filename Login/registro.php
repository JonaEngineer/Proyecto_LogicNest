<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $userEmail = $_POST['userEmail'];
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];

    // Verificar si el usuario ya existe en la base de datos
    $check_query = "SELECT * FROM users WHERE userEmail='$userEmail' OR userName='$userName'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "El correo electrónico o nombre de usuario ya están en uso";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $insert_query = "INSERT INTO users (name, address, number, userEmail, userName, userPassword) VALUES ('$name', '$address', '$number', '$userEmail', '$userName', '$userPassword')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
