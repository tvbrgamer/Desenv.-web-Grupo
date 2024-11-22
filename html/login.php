<?php //Perdão professor, eu queria fazer um melhor, mas passei um tempo na casa da minha tia e não tive tempo de fazer mais bonito ?>

<?php

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && $usuario['senha'] === $senha) {
            header("Location: painel.php");
            exit();
        } else {
            echo "E-mail ou senha incorretos!";
        }
    } else {
        echo "Todos os campos são obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/borda.css">
    <link rel="stylesheet" href="css/fontes.css">
    <link rel="stylesheet" href="css/login.css">
    <script defer src="js/show.js"></script>

    <link rel="shortcut icon" href="imagens/iconeaba.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Konnect</title>
</head>

<body>
    <header>
        <div id="Logo">
            <a href="index.php">
                <img id="imgLogo" src="imagens/icon.png" alt="capivara logo" />
            </a>
        </div>
        <div id="headerButton">
            <a href="aindanfiz.php">
                <div id="atendimento">Atendimento</div>
            </a>
            <a href="sobrenos.php">
                <div id="sobre">Sobre Nós</div>
            </a>
        </div>
    </header>

    <div id="container">
        <div id="loginTxt-container">
            <p>Login</p>
        </div>
        <section>


            <form method="POST" action="" id="dados">
                <div class="col-3">
                    <input id="emailInput" name="email" class="effect-8" required type="email" placeholder="E-mail:" autocomplete="on">
                    <span class="focus-border">
                        <i></i>
                    </span>
                </div>

                <div class="col-3">
                    <input id="senhaInput" name="senha" class="effect-8" required type="password" placeholder="Senha:" autocomplete="off">
                    <button type="button" id="olho"> &nbsp; </button>
                    <span class="focus-border">
                        <i></i>
                    </span>
                </div>

                <button type="submit" id="logarButton" class="loginButton">Logar</button>
            </form>

        </section>
    </div>
    <footer>
        <div id="footerA">
            <a href="aindanfiz.php">Política de privacidade</a>
            <a href="aindanfiz.php">Portal de privacidade</a>
        </div>
        <div id="direitosFooter">© 2023 Konnect. Todos os direitos reservados. CNPJ: 25.940.934/0001-34 - Rua Coronel
            Alencastro, 48 - Rio de Janeiro - RJ</div>
    </footer>
    <div id="mensagemTela">
        <h2>Nosso site não suporta esse tamanho de tela atualmente</h2>
    </div>
</body>

</html>