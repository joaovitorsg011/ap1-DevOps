<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_correto = "usuario";
    $senha_correta = "senha123";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $usuario_correto && $password == $senha_correta) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bem-vindo!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #ecee8e;
        }
        h1 {
            color: rgb(73, 170, 77);
        }
        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-login {
            background-color: #1b631d;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            width: 100%;
        }
        .btn-login:hover {
            background-color: #145c14;
        }
        p {
            margin-top: 20px;
        }
        .erro {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Bem-vindo a nossa Pagina!</h1>
    <p>Por favor, faça o login para continuar.</p>

    <div class="login-container">
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Usuário" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit" class="btn-login">Entrar</button>
        </form>

        <?php if (isset($erro)): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>
    </div>

    

</body>
</html>
