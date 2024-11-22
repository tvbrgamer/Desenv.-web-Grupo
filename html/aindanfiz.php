<?php //Perdão professor, eu queria fazer um melhor, mas passei um tempo na casa da minha tia e não tive tempo de fazer mais bonito ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontes.css">
    <link rel="stylesheet" href="css/aindanfiz.css">


    <link rel="shortcut icon" href="imagens/iconeaba.png" type="image/x-icon">
    <title>Não deu tempo</title>
  </head>

  <body onload="retornar()">
    <button id="voltar" onclick="voltar()">Voltar</button>

    <div id="saulGoodman"> <h3 id="nfiz">Não fiz</h3></div>

    <audio id="audio" controls autoplay loop>
      <source src="imagens/nfiz.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </body>
</html>

<script>
  function voltar() {
    history.back();
  }
  const retornar = () => {
    setTimeout(() => history.back(), 13000);
  };
</script>
