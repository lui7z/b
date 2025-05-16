<?php

require_once '../classes/Sessao.php';
Sessao::iniciar();

if (!isset($_POST['acao'])) {
    header("Location: ../index.php?erro=Ação inválida");
    exit;
}

$acao = $_POST['acao'];

if ($acao === 'entrar') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $caminhoArquivo = '../storagem/usuarios.json';
    $usuarios = json_decode(file_get_contents($caminhoArquivo), true);

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['idioma'] = $usuario['idioma'];
                $_SESSION['tema'] = $usuario['tema'];
                $_SESSION['nome'] = $usuario['nome'];

                header('Location: ../dashboard.php');
                exit;
            } else {
                header('Location: ../index.php?erro=Senha incorreta');
                exit;
            }
        }
    }

    header('Location: ../index.php?erro=Usuário não encontrado');
    exit;
} elseif ($acao === 'cadastrar') {
    require '../cadastro.php';
} else {
    header("Location: ../index.php?erro=Ação desconhecida");
    exit;
}
?>
