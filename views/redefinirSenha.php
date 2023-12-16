<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do cliente - Telecall</title>
    <link rel="stylesheet" href="/telecall/assets/framework/bulma/bulma/css/bulma.css">
    <link rel="icon" type="image/jpg" href="/telecall/assets/img/Untitled.png">
    <link rel="stylesheet" href="/telecall/assets/css/redefinirSenha.css">
    <link rel="stylesheet" href="/telecall/assets/vendors/fontawesome/css/all.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/acessibilidade.css">
    <script src="/telecall/assets/js/jquery-3.7.0.js.js"></script>
    <script src="/telecall/assets/js/jquery.mask.min.js"></script>
    <script src="/telecall/assets/framework/bulma/bulma/bulma-toast/dist/bulma-toast.min.js"></script>
    <script src="/telecall/assets/js/acessibilidade.js"></script>
</head>

<body>
    <!--INICIO DA NAVBAR-->

    <!--FINAL DA MINHA NAV-->


    <!--COMEÇO DO MEU LOGIN-->

    <form action="/telecall/models/redefinirSenha.php" method="post">
        <section class="hero is-fullheight" id="divdologin">
            <div class="hero-body is-justify-content-center is-align-items-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column">
                        <p class="title is-3">Bem vindo a <span class="corVermelho">Telecall</span> </p>
                        <p class="subtitle is-6" id="pCinza">Olá novamente! Para garantir sua segurança, por favor,<br> forneça seus dados para a troca de senha.</p>
                        <label for="login">Login:</label>
                        <input class="input is-danger" id="login" name="login" type="text" placeholder="Digite aqui seu login" required>
                    </div>
                    <div class="column">
                        <label for="senha">Antiga senha:</label>
                        <input class="input is-danger" id="senha" name="senha" type="password" placeholder="Digite aqui sua senha" required>
                        <a href="/telecall/recuperarSenha" class="is-size-7 has-text-link"></a>
                    </div>
                    <div class="column">
                        <label for="senha">Nova senha:</label>
                        <input class="input is-danger" id="novaSenha" name="novaSenha" type="password" placeholder="Digite aqui sua senha" required>
                        <a href="/telecall/recuperarSenha" class="is-size-7 has-text-link"></a>
                    </div>
                    <div class="column">
                        <label for="senha">Confirme nova senha:</label>
                        <input class="input is-danger" id="confirmeNovaSenha" name="cofirmeNovaSenha" type="password" placeholder="Digite aqui sua senha" required>
                        <a href="/telecall/recuperarSenha" class="is-size-7 has-text-link"></a>
                    </div>
                    <div class="field is-grouped">
                        <div class="column">
                            <button class="button is-fullwidth is-medium entrarcor" id="redefinir" type="submit">Redefinir</button>
                        </div>
                    </div>
                    <div class="has-text-centered">
                        <p class="is-size-7">Não tem uma conta? <a href="/telecall/usuario/cadastro" class="has-text-link"> Inscreva-se</a>
                        </p>
                    </div>
                </div>
            </div>
            <p class="subtitle is-6" id="pcop">© Telecall 2023 </p>
        </section>
    </form>
    <!--FINAL DO LOGIN-->


    <script src="/telecall/assets/js/mobilemenu.js"></script>
    <script src="/telecall/assets/js/redefinirSenha.js"></script>
</body>

</html>