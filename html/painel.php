<?php //Perdão professor, eu queria fazer um melhor, mas passei um tempo na casa da minha tia e não tive tempo de fazer mais bonito ?>

<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("SELECT aparece FROM mostrar WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
        $novoValor = $registro['aparece'] == 1 ? 0 : 1;

        $sql = "UPDATE mostrar SET aparece = :aparece WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':aparece', $novoValor, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    }
}

$sql = "SELECT id, aparece FROM mostrar";
$stmt = $pdo->query($sql);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <a href="logins.php">
                <div id="sobre">Logins</div>
            </a>
        </div>
    </header>

    <div id="container">
        <div id="loginTxt-container">
            <p>Atualizar Valor de "Aparece"</h1>
        </div>
        <section>

            <table border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aparece</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $linha): ?>
                        <tr>
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['aparece'] ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                                    <button type="submit">
                                        <?= $linha['aparece'] == 1 ? 'Desativar' : 'Ativar' ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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