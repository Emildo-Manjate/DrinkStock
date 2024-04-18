<?php

require_once 'db.php';
require_once 'session.php';

function login($email, $senha) {
    global $conn;
    
    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);
    
    $query = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $usuario = mysqli_fetch_assoc($result);
        iniciar_sessao();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['tipo_usuario'] = $usuario['tipo'];
        return true;
    } else {
        return false;
    }
}

function verificar_login() {
    iniciar_sessao();
    return isset($_SESSION['usuario_id']);
}

function verificar_tipo_usuario($tipo) {
    iniciar_sessao();
    return isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == $tipo;
}

function logout() {
    iniciar_sessao();
    session_destroy();
}

?>
