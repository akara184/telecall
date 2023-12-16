<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA - Telecall</title>
    <link rel="stylesheet" href="/telecall/assets/framework/bulma/bulma/css/bulma.css">
    <link rel="icon" type="image/jpg" href="/telecall/assets/img/Untitled.png">
    <link rel="stylesheet" href="/telecall/assets/css/loginDoisFA.css">
    <link rel="stylesheet" href="/telecall/assets/vendors/fontawesome/css/all.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/acessibilidade.css">
    <script src="/telecall/assets/js/jquery-3.7.0.js.js"></script>
    <script src="/telecall/assets/js/jquery.mask.min.js"></script>
    <script src="/telecall/assets/framework/bulma/bulma/bulma-toast/dist/bulma-toast.min.js"></script>
    <script src="/telecall/assets/js/acessibilidade.js"></script>
    <script src="/telecall/assets/js/loginDoisFA.js"></script>

</head>





<body>
    <!-- Verifica se o usuario está logado, se sim, a página morre -->
    <?php
    include 'models/loginDados.php';
    require 'models/conexao.php';


    if (array_sum($_SESSION) > 0) {
        if ($_SESSION['perfil'] == "2" || $_SESSION['perfil'] == "1") {
            die("");
        }
    }

    $getUsuario = filter_input(INPUT_GET, "usuario", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql =  sprintf(
        "SELECT * FROM usuario 
                    WHERE login = '$getUsuario'",
        $mysqli->real_escape_string($getUsuario)
    );

    $result = $mysqli->query($sql);

    //DADOS DO USUARIO
    $usuario = $result->fetch_assoc();


    if ($getUsuario != $usuario["login"]) {

        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        die("USUARIO NÃO EXISTE");
    }



    ///LOG INFOR




    $random = rand(1, 3);
 

    ?>



    <form action="/telecall/models/loginDoisFA.php?" method="GET">
        <?php
        if ($random == 1) {

        ?>
            <section class="hero is-fullheight" id="divdologin">
                <div class="hero-body is-justify-content-center is-align-items-center">
                    <div class="columns is-flex is-flex-direction-column box">
                        <div class="column">
                            <p class="title is-3">Insire o <span class="corVermelho">Nome materno</span> </p>
                            <input class="input is-danger" id="nomeMaterno" name="nomeMaterno" type="text" placeholder="Digite a resposta" required>
                            <p class="error username-error"></p>
                        </div>
                        <input type="hidden" name="tipo" value="<?php echo $random; ?>">
                        <input type="hidden" name="login" value="<?php echo $getUsuario; ?>">

                        <div class="field is-grouped">
                            <div class="column">
                                <button class="button is-fullwidth is-medium entrarcor" id="entrar" name="entrar" type="submit">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="subtitle is-6" id="pcop">© Telecall 2023 </p>
            </section>
        <?php
        }

        if ($random == 2) {

        ?>
            <section class="hero is-fullheight" id="divdologin">
                <div class="hero-body is-justify-content-center is-align-items-center">
                    <div class="columns is-flex is-flex-direction-column box">
                        <div class="column">
                            <p class="title is-3">insira seu <span class="corVermelho">CEP</span> </p>
                            <input class="input is-danger" id="cep" name="cep" type="text" placeholder="Digite a resposta" required>
                            <p class="error username-error"></p>
                        </div>
                        <input type="hidden" name="tipo" value="<?php echo $random; ?>">
                        <input type="hidden" name="login" value="<?php echo $getUsuario; ?>">

                        <div class="field is-grouped">
                            <div class="column">
                                <button class="button is-fullwidth is-medium entrarcor" id="entrar" name="entrar" type="submit">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="subtitle is-6" id="pcop">© Telecall 2023 </p>
            </section>
        <?php



        }
        if ($random == 3) {

        ?>
            <section class="hero is-fullheight" id="divdologin">
                <div class="hero-body is-justify-content-center is-align-items-center">
                    <div class="columns is-flex is-flex-direction-column box">
                        <div class="column">
                            <p class="title is-3">insira sua <span class="corVermelho">Data de Nascimento</span> </p>
                            <div class="field">
                                <label class="label">Data de Nascimento:</label>
                                <div class="field-body">
                                    <div class="field">
                                        <p class="control has-icons-left">
                                            <input class="input" id="dataDeNascimento" name="dataDeNascimento" type="date" max="2090-12-31" required>
                                            <span class="icon is-small is-left">
                                                <i class="fas fa-calendar"></i>
                                            </span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="tipo" value="<?php echo $random; ?>">
                        <input type="hidden" name="login" value="<?php echo $getUsuario; ?>">
                        <div class="field is-grouped">
                            <div class="column">
                                <button class="button is-fullwidth is-medium entrarcor" id="entrar" name="entrar" type="submit">Entrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="subtitle is-6" id="pcop">© Telecall 2023 </p>
            </section>
        <?php
        }

        ?>
    </form>
    <!--FINAL DO LOGIN-->

    <script src="/telecall/assets/js/mobilemenu.js"></script>
</body>

</html>