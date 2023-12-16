//VERIFICAÇÃO AO CLICAR NO BUTTON ENTRAR
$("#redefinir").click(function (e) {
  var login = $("#login").val();
  var senha = $("#senha").val();
  var novaSenha = $("#novaSenha").val();
  var confirmeNovaSenha = $("#confirmeNovaSenha").val();

  if (!login.match(/^[a-zA-Z]{6}$/)) {
    $("#login").focus();
    bulmaToast.toast({
      message: "Login invalido",
      type: "is-link",
      position: "bottom-center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!senha.match(/^[a-zA-Z]{8}$/)) {
    $("#senha").focus();
    bulmaToast.toast({
      message: "Senha invalido",
      type: "is-link",
      position: "bottom-center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!novaSenha.match(/^[a-zA-Z]{8}$/)) {
    $("#novaSenha").focus();
    bulmaToast.toast({
      message: "nova Senha Invalida",
      type: "is-link",
      position: "bottom-center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!confirmeNovaSenha.match(/^[a-zA-Z]{8}$/)) {
    $("#confirmeNovaSenha").focus();
    bulmaToast.toast({
      message: "Confime Senha invalido",
      type: "is-link",
      position: "bottom-center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (confirmeNovaSenha != novaSenha) {
    bulmaToast.toast({
      message: "Senhas não conferem",
      type: "is-link",
      position: "bottom-center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  }
});
