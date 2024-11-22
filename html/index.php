<?php //Perdão professor, eu queria fazer um melhor, mas passei um tempo na casa da minha tia e não tive tempo de fazer mais bonito ?>

<?php

require 'database.php';

$sql = "SELECT id, aparece FROM mostrar WHERE id IN (1, 2, 3)";
$stmt = $pdo->query($sql);
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

$cards = [];
foreach ($registros as $registro) {
  $cards[$registro['id']] = $registro['aparece'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="imagens/iconeaba.png" type="image/x-icon" />

  <link rel="stylesheet" href="css/borda.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/fontes.css" />

  <script defer src="js/modal.js"></script>
  <script defer src="js/modalScript.js"></script>
  <script defer src="js/cep.js"></script>
  <script defer src="js/valida.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
    rel="stylesheet" />

  <title>Konnect</title>
</head>

<body class="scroll" onload="ToggleNum()">
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
      <a href="login.php" class="loginA">
        <div class="login">
          <div id="imgLogin"></div>
          <span id="loginTxt">Login</span>
        </div>
      </a>
    </div>
  </header>

  <dialog id="dialog">
    <div id="upDialog">
      <h2 id="updialogH2">Assinatura</h2>

      <button id="updialogButton" onclick="Closemodal()" type="button">
        X
      </button>
    </div>

    <div id="bottomDialog">
      <h2 id="bottomdialogH2">Insira o CEP do local de instalação</h2>
      <div id="dados">
        <div id="cepInput" class="col-3">
          <input
            id="cepInputt"
            class="effect-8"
            type="text"
            maxlength="9"
            placeholder="CEP:"
            oninput="habilitarBotaom()"
            onchange="habilitarBotaom()"
            autocomplete="off" />
          <span class="focus-border">
            <i></i>
          </span>
        </div>

        <div id="numeroInput" class="col-3">
          <input
            id="numeroInputt"
            class="effect-8"
            type="number"
            maxlength="10"
            placeholder="Nº:"
            oninput="habilitarBotaom()"
            onchange="habilitarBotaom()"
            autocomplete="off" />
          <span class="focus-border">
            <i></i>
          </span>
        </div>

        <button
          disabled="disabled"
          type="submit"
          id="consultDisponibilidade"
          class="consultarButton"
          type="button">
          Consultar disponibilidade
        </button>
      </div>

      <div id="utilitario">
        <a
          id="nseiCEP"
          href="https://buscacepinter.correios.com.br/app/endereco/index.php"
          target="_blank"
          rel="noopener noreferrer">Não sei meu CEP</a>

        <div id="ntemNum">
          <input
            type="checkbox"
            id="chkNPN"
            value=""
            onchange="ToggleNum()" />
          Não possuo número
        </div>
      </div>
    </div>
  </dialog>

  <div id="txtBody">
    <h1>Planos de Internet para a sua casa</h1>
    <h3>Aproveite as opções de planos que temos para você.</h3>
  </div>

  <section id="cardArea">

  <?php if ($cards[1] == 0 && $cards[2] == 0 && $cards[3] == 0) echo '
  <div class="cardBox" id="cardItemNormal">
        <div class="cardItem">
          <div class="txtArea">
            <h1>Acabaram os Planos</h1>

            <h3>Pedimos perdão pelo inconveniente</h3>

          </div>
        </div>
        <div class="cardBottom">
          <div class="txtArea">
            <h3>A partir de:</h3>
            <h1>R$0/mês</h1>
          </div>
        </div>
      </div>'; ?>

    <?php if (isset($cards[1]) && $cards[1] == 1) echo '
    <div class="cardBox" id="cardItemNormal">
        <div class="cardItem">
          <div class="txtArea">
            <h1>75 Mega</h1>

            <h3>Internet com wifi grátis</h3>

            <h4>Acesso ao Konnectus</h4>

            <img
              class="imgKonnectus"
              src="imagens/Konnectus.png"
              alt="konnectus"
              width="40px"
            />
          </div>
        </div>
        <div class="cardBottom">
          <div class="txtArea">
            <h3>A partir de:</h3>
            <h1>R$ 39,90/mês</h1>
          </div>
          <button
            onclick="Showmodal(), Valor(name)"
            class="buttonAssinar"
            id="button39"
            name="39"
          >
            Assinar
          </button>
        </div>
      </div>'; ?>

    <?php if (isset($cards[2]) && $cards[2] == 1) echo '
    <div class="cardBox">
      <div class="cardTop" id="cardMaisvendido">
        <img src="./imagens/estrela.png" alt="" srcset="" />
        <span>&nbsp Mais vendido</span>
      </div>
      <div class="cardItem">
        <div class="txtArea">
          <h1>100 Mega</h1>

          <h3>Internet com wifi grátis</h3>

          <h4>Acesso ao Konnectus</h4>

          <img
            class="imgKonnectus"
            src="imagens/Konnectus.png"
            alt="konnectus"
            width="40px" />
        </div>
      </div>
      <div class="cardBottom">
        <div class="txtArea">
          <h3>A partir de:</h3>
          <h1>R$ 69,90/mês</h1>
        </div>
        <button
          onclick="Showmodal(), Valor(name)"
          class="buttonAssinar"
          id="button69"
          name="69">
          Assinar
        </button>
      </div>
    </div>'; ?>


    <?php if (isset($cards[3]) && $cards[3] == 1) echo '
    <div class="cardBox">
      <div class="cardTop" id="cardMaisvelocidade">
        <img src="./imagens/estrela.png" alt="" srcset="" />
        <span>&nbsp Mais velocidade</span>
      </div>
      <div class="cardItem">
        <div class="txtArea">
          <h1>500 Mega</h1>

          <h3>Internet com wifi grátis</h3>

          <h4>Acesso ao Konnectus</h4>

          <img
            class="imgKonnectus"
            src="imagens/Konnectus.png"
            alt="konnectus"
            width="40px" />
        </div>
      </div>
      <div class="cardBottom">
        <div class="txtArea">
          <h3>A partir de:</h3>
          <h1>R$ 169,90/mês</h1>
        </div>
        <button
          onclick="Showmodal(), Valor(name)"
          class="buttonAssinar"
          id="button169"
          name="169">
          Assinar
        </button>
      </div>
    </div>'; ?>

  </section>

  <section id="ESports">
    <div id="txtArea">
      <h1>Conheça o nosso time de E-Sports</h1>
      <h3>
        Venha conhecer o universo dos Kagueimers,<br /><br />
        um time de e-sports que não para de surpreender!<br /><br />
        Acompanhe-nos e seja parte dessa incrível jornada gueimer!
      </h3>
    </div>

    <img
      id="imgESports"
      src="imagens/Kagagueime.png"
      alt="ESports kagueimers" />
  </section>

  <footer>
    <div id="footerA">
      <a href="aindanfiz.php">Política de privacidade</a>
      <a href="aindanfiz.php">Portal de privacidade</a>
    </div>
    <div id="direitosFooter">
      © 2023 Konnect. Todos os direitos reservados. CNPJ: 25.940.934/0001-34 -
      Rua Coronel Alencastro, 48 - Rio de Janeiro - RJ
    </div>
  </footer>
  <div id="mensagemTela">
    <h2>Nosso site não suporta esse tamanho de tela atualmente</h2>
  </div>
</body>

</html>