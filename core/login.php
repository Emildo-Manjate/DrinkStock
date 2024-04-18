<?php
require_once('auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (login($email, $senha)) {
        // Login bem-sucedido, redirecionar para a página principal
        header('Location: index.php');
        exit();
    } else {
        // Login falhou, exibir mensagem de erro
        $erro_login = "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($erro_login)) { ?>
        <p><?php echo $erro_login; ?></p>
    <?php } ?>
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
