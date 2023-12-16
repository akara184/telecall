$(document).ready(function () {
  $("#cep").mask("00000000");



  $("#entrar").click(function (e) {
    var cep = $("#cep").val();
    var nomeMaterno = $("#nomeMaterno").val();
    var dataDeNascimento = $("#dataDeNascimento").val();


    if (!cep.match(/^\d{8}$/)) {
      $("#cep").focus();
      bulmaToast.toast({
        message: "O campo de CEP é preciso ser do formato 00000000.",
        type: "is-link",
        position: "center",
        pauseOnHover: true,
        dismissible: true,
        closeOnClick: true,
        opacity: 1,
      });
      e.preventDefault();
    } else if (nomeMaterno == "" || !nomeMaterno.match(/^[a-zA-Z\sÀ-ü]+$/)) {
      $("#nomeMaterno").focus();
      bulmaToast.toast({
        message: "O Nome Materno é obrigatório",
        type: "is-link",
        position: "center",
        pauseOnHover: true,
        dismissible: true,
        closeOnClick: true,
        opacity: 1,
      });
      e.preventDefault();
    } else if (dataDeNascimento == "") {
      $("#dataDeNascimento").focus();
      bulmaToast.toast({
        message: "Insira uma dataDeNascimento",
        type: "is-link",
        position: "center",
        pauseOnHover: true,
        dismissible: true,
        closeOnClick: true,
        opacity: 1,
      });
      e.preventDefault();

    }
    else {
      bulmaToast.toast({
        message: "USUÁRIO CRIADO COM SUCESSO",
        type: "is-success",
        position: "center",
        pauseOnHover: true,
        dismissible: true,
        closeOnClick: true,
        opacity: 1,
      });
      //LOCAL STORAGE
      localStorage.setItem("login", login);
      localStorage.setItem("senha", senha);

      // window.location.href = ".././login.php";
    }
  });

});