const Cep = document.querySelector("#cepInputt");
const Numero = document.querySelector("#numeroInputt");
const chkNPN = document.querySelector("#chkNPN");
const botaoFechar = document.querySelector("#updialogbutton");
const effectCep = document.querySelector(".effect-8#cepInputt~.focus-border");
var desativado = false;

//* Valida se todos os inputs estão corretos e então habilita o botão
const habilitarBotaom = () => {
  const inputCep = document.querySelector("#cepInputt").value;
  const inputNumero = document.querySelector("#numeroInputt").value;
  if (inputCep.length == 9 && (inputNumero.length >= 1 || desativado == true)) {
    if (validarCep(inputCep)) {
      document.querySelector("#consultDisponibilidade").disabled = false;
      return;
    } else {
      document.querySelector("#consultDisponibilidade").disabled = true;
    }
  } else {
    document.querySelector("#consultDisponibilidade").disabled = true;
  }
};

//* Valida se o cep digitado segue o padrão
const validarCep = (cep) => {
  let test = /[0-9]{5}-[0-9]{3}/;
  cep = cep.replace(/^\s+|\s+$/g, "");
  if (test.test(cep)) {
    return true;
  } else {
    return false;
  }
};

//* Faz com que ao terminar de digitar o cep, o foco vá para o input de número e retira a borda vermelha de erro
Cep.addEventListener("input", () => {
  let inputlength = Cep.value.length;
  Cep.style.borderColor = "#ccc";
  effectCep.style.setProperty("--effectwow", "#3399FF");
  Cep.title = "";
  if (inputlength === 9) {
    Numero.focus();
  }
});

//* Desabilita o input de número ao deixar marcado a chk
const ToggleNum = () => {
  if (chkNPN.checked) {
    desativado = true;
    Numero.disabled = true;
    Numero.value = 0;
  } else {
    desativado = false;
    Numero.disabled = false;
    Numero.value = null;
  }
  habilitarBotaom();
};

//* Limpa o inputs ao fechar o modal
const Limpar = () => {
  effectCep.style.setProperty("--effectwow", "#3399FF");
  Cep.value = "";
  Numero.value = "";
  chkNPN.checked = false;
  Numero.disabled = false;
};

//* permite o click no botão utilizando o enter
const keyboard = (event) => {
  if (
    event.keyCode === 13 &&
    document.querySelector("#consultDisponibilidade").disabled == false
  ) {
    consultDisponibilidade.click();
  }
};

Cep.addEventListener("keydown", keyboard);
Numero.addEventListener("keydown", keyboard);

//* Mascara do Cep
document.addEventListener("DOMContentLoaded", () => {
  new Cleave("#cepInputt", {
    delimiters: ["-"],
    blocks: [5, 3],
    numericOnly: true,
  });
});
