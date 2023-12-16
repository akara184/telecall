//NÚMEROS JÁ PRÉ DEFINIDO O FORMATO
$(document).ready(function () {
  $("#cpf").mask("000.000.000-00");
  $("#cep").mask("00000-000");
  $("#telefoneCelular").mask("(+55)00-000000000");  
  $("#telefoneFixo").mask("(+55)00-00000000");
});
//Validação do formulário
$("#cadastro").click(function (e) {
  var nome = $("#nome").val();
  var nomeMaterno = $("#nomeMaterno").val();
  var dataDeNascimento = $("#dataDeNascimento").val();
  var sexo = $("#sexo").val();
  var cpf = $("#cpf").val();
  var telefoneCelular = $("#telefoneCelular").val();
  var telefoneFixo = $("#telefoneFixo").val();
  var endereco = $("#endereco").val();
  var login = $("#login").val();
  var senha = $("#senha").val();
  var confirmeSenha = $("#confirmeSenha").val();
  var cep = $("#cep").val();

  if (nome.length < 15 || nome.length > 60 || !nome.match(/^[a-zA-Z\sÀ-ü]+$/)) {
    $("#nome").focus();
    bulmaToast.toast({
      message: "O nome deve ter entre 15 e 60 caracteres e conter apenas letras",
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
    
  } else if (sexo == "Selecione") {
    $("#sexo").focus();
    bulmaToast.toast({
      message: "Selecione um sexo",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (cpf.length < 14  && !cpf.match(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/)) {
    $("#cpf").focus();
    bulmaToast.toast({
      message: "Insira um CPF no formato: EX:000.000.000-00",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!telefoneCelular.match(/^\(\+55\)\d{2}-\d{9}$/)) {
    $("#telefoneCelular").focus();
    bulmaToast.toast({
      message: "Insira um telefone celular no formato: EX: (+55)XX-XXXXXXXXX",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!telefoneFixo.match(/^\(\+55\)\d{2}-\d{8}$/)) {
    $("#telefoneFixo").focus();
    bulmaToast.toast({
      message: "Insira um telefone fixo no formato: EX: (+55)XX-XXXXXXXX",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (endereco == "" ) {
    $("#endereco").focus();
    bulmaToast.toast({
      message: "O endereço é obrigatório",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } 
  else if (!cep.match(/^\d{5}-\d{3}$/)){
    $("#cep").focus();
    bulmaToast.toast({
      message: "O campo de CEP é preciso ser do formato 00000-000.",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  }
  else if (!login.match(/^[a-zA-Z]{6}$/)) {
    $("#login").focus();
    bulmaToast.toast({
      message: "O campo Login deve ter exatamente 6 caracteres alfabéticos.",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!senha.match(/^[a-zA-Z]{8}$/)) {
    $("#senha").focus();
    bulmaToast.toast({
      message: "O campo Senha deve ter 8 caracteres alfabéticos",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (!confirmeSenha.match(/^[a-zA-Z]{8}$/)) {
    $("#confirmeSenha").focus();
    bulmaToast.toast({
      message: "O campo Senha deve ter 8 caracteres alfabéticos.",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  } else if (senha !== confirmeSenha) {
    bulmaToast.toast({
      message: "As senhas não conferem",
      type: "is-link",
      position: "center",
      pauseOnHover: true,
      dismissible: true,
      closeOnClick: true,
      opacity: 1,
    });
    e.preventDefault();
  }else {
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