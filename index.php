<!--
  Antes, o arquivo principal de vocês era o "index.html" (A 1° Página referente a Tela de Cadastro/Login)
  O Login não estava funcionando corretamente pois vocês estavam inserindo Firebase no Projeto
  Pelo que entendi estava sendo usando tanto Scripts como um Banco de Dados do Firebase
  Mas como as informações de Login dos Usuários estão sendo salvas Localmente atráves do arquivo "usuarios.json"
  Tava entrando em conflito e por isso não estava sendo possível logar
  Consequentemente eu remove esses scripts do Firebase,

  Também tinha o fato de que aparentava ter algum conflito em relação a diretório
  Aparentemente vocês estavam indo para determinado "index.html", mas mexendo no "index.html" de outra Pasta/Projeto.

  Então, o arquivo "index.html" foi substitudo por esse arquivo "index.php", que é a Página de Cadastro/Login
  "dashboard.php" é a Página Inicial após o Login (Que Anteriormente era o arquivo "login.php")
  e só foram adicionados 2 Arquivos extras

  "cadastro.php"  ->  Interage com o "Usuario.php" e "usuarios.json" para efetuar o Cadastro de um Usuário

  "config.php"  ->  Interage com o "cadastro.php" caso o botão de Cadastrar seja Pressionado
                ->  Cria a Sessão interagindo com o "Sessao.php" (O que antes estava sendo feito no "login.php)
                ->  Mantem o Usuário na Página "index.php" (Impedindo de ir direto ao "dashboard.php" pelo URL)
                ->  Verifica o "Usuario.php + usuario.json" a fim de encontrar um usuário 
                que bata com as informações Preenchidas ao Logar, redirecionando-o para o "dashboard.php"

  Uma pequena parte do código presente em ambos já estava no antigo "login.php", ele foi apenas re-organizado
  De resto eu não mexi em absolutamente nada com exceção de limpar o "usuarios.json"
  (As senhas dos "testes" são os nomes)!
-->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro / Login</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="form-box">
    <h2>Cadastro / Login</h2>

    <?php if (isset($_GET['erro'])): ?>
      <div style="color:red"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <form method="POST" action="classes/config.php">
      <input type="text" name="nome" placeholder="Nome Completo">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <select name="idioma" id="idioma">
        <option value="pt">Português</option>
        <option value="en">Inglês</option>
      </select><br>
      <label><input type="radio" name="tema" value="Claro" checked> Claro</label>
      <label><input type="radio" name="tema" value="Escuro"> Escuro</label><br><br>

      <button type="submit" name="acao" value="entrar">Entrar</button>
      <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
    </form>
  </div>

  <script src="scripts/local.js"></script>
</body>
</html>