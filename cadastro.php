<?php
require_once 'Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $idioma = $_POST['idioma'];
    $tema = $_POST['tema'];

    $arquivo = '../storagem/usuarios.json';
    $usuarios = [];

    if (file_exists($arquivo)) {
        $usuarios = json_decode(file_get_contents($arquivo), true);
    }

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            header("Location: ../index.php?erro=Email já cadastrado");
            exit;
        }
    }

    $novoUsuario = new Usuario($nome, $email, $senha, $idioma, $tema);
    $usuarios[] = [
        'nome' => $novoUsuario->getNome(),
        'email' => $novoUsuario->getEmail(),
        'senha' => $novoUsuario->getSenhaHash(),
        'idioma' => $novoUsuario->getIdioma(),
        'tema' => $novoUsuario->getTema()
    ];

    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));
    header("Location: ../index.php");
}
