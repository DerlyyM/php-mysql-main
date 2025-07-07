<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $document = $con->real_escape_string($_POST['document']);
    $names = $con->real_escape_string($_POST['names']);
    $phone = $con->real_escape_string($_POST['phone']);
    $profesion = $con->real_escape_string($_POST['profesion']);
    $email = $con->real_escape_string($_POST['email']);
    $contra = password_hash($_POST['contra'], PASSWORD_DEFAULT);
    $tipo_usuario_id = (int) $_POST['tipo_usuario'];
    $desc_perfil = $con->real_escape_string($_POST['desc_perfil']);

    $sql = "INSERT INTO usuarios (document, names, phone, profesion, email, contra, tipo_usuario_id, desc_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssssssis', $document, $names, $phone, $profesion, $email, $contra, $tipo_usuario_id, $desc_perfil);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar usuario: " . $stmt->error;
    }
}
?>
