//VERIFICAÇÃO AO CLICAR NO BUTTON ENTRAR
$("#entrar").click(function (e) {
  var login = $("#login").val();
  var senha = $("#senha").val();

  if (!login.match(/^[a-zA-Z]{6}$/)) {
    $("#login").focus();
    bulmaToast.toast({
      message: "Digite um login",
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
      message: "Digite uma senha",
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
//LOCAL STORAGE
  
//   if(login == localStorage.getItem("login") && senha == localStorage.getItem("senha")){
//     window.location = "../../views/main/home.php";
//  }
//   else{
//     bulmaToast.toast({
//       message: "Usuário inválido",
//       type: "is-link",
//       position: "bottom-center",
//       pauseOnHover: true,
//       dismissible: true,
//       closeOnClick: true,
//       opacity: 1,
//     });
//   }

