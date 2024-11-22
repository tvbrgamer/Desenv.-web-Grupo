<?php //Perdão professor, eu queria fazer um melhor, mas passei um tempo na casa da minha tia e não tive tempo de fazer mais bonito ?>

<?php
require 'database.php';

$resultados = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email LIKE :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', "%$email%", PDO::PARAM_STR); 
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <a href="painel.php">
                <div id="sobre">Painel</div>
            </a>
        </div>
    </header>

    <div id="container">
        <div id="loginTxt-container">
            <p>Buscar E-mail na Tabela</h1>
        </div>
        <section>

<form method="POST">

    <label for="email">Digite o e-mail (ou parte dele):</label>
    <br><br>
    <input type="txt" id="email" name="email" placeholder="ex: admin@gmail.com" required>

    <button type="submit">Buscar</button>
    <br><br>

</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>Resultado da Busca:</h2>

    <?php if (!empty($resultados)): ?>
        <table border="0" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $linha): ?>
                    <tr>
                        <td><?= htmlspecialchars($linha['ID']) ?></td>
                        <td><?= htmlspecialchars($linha['email']) ?></td>
                        <td><?= htmlspecialchars($linha['senha']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><strong>Nenhum e-mail encontrado.</strong></p>
    <?php endif; ?>
<?php endif; ?>

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