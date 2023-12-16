<!DOCTYPE html>
<html lang="pt-BR" class="has-navbar-fixed-top">
<!--A framwork BULMA na documentação sugere essa classe na tag HTML. -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Telecall</title>
    <link rel="stylesheet" href="/telecall/assets/framework/bulma/bulma/css/bulma.css">
    <link rel="icon" type="image/jpg" href="/telecall/assets/img/Untitled.png">
    <link rel="stylesheet" href="/telecall/assets/css/cadastro.css">
    <link rel="stylesheet" href="/telecall/assets/vendors/fontawesome/css/all.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/acessibilidade.css">
    <script src="/telecall/assets/js/jquery-3.7.0.js.js"></script>
    <script src="/telecall/assets/js/jquery.mask.min.js"></script>
    <script src="/telecall/assets/framework/bulma/bulma/bulma-toast/dist/bulma-toast.min.js"></script>
    <script src="/telecall/assets/js/acessibilidade.js"></script>


</head>

<body>
    <!--INICIO DA NAVBAR-->
    <?php
    if (array_sum($_SESSION) > 0) {
        if ($_SESSION['perfil'] == "2" || $_SESSION['perfil'] == "1") {
            die("");
        }
    }
    ?>
    <!--FINAL DA MINHA NAV-->

    <!--INICIO DO MEU CADASTRO-->

    <form action="/telecall/models/cadastroForm.php" method="POST">
        <section class="hero is-fullheight ">
            <div class="hero-body is-justify-content-center">
                <div class="columns is-flex is-flex-direction-column box">
                    <p class="title is-1">Crie sua conta na <span class="corVermelho">Telecall</span></p>
                    <p class="subtitle is-5" id="pCinza">Explore um novo mundo de comunicação e colaboração.</p>

                    <div class="field">
                        <label class="label">Nome:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="nome" name="nome" type="text" placeholder="Digite seu nome completo"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                <p class="help is-link">O campo nome <span class="exatamente"> deve ter no mínimo 15
                                        caracteres e no máximo 60 caracteres alfabéticos</span></p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Nome Materno:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="nomeMaterno" name="nomeMaterno" type="text"
                                        placeholder="Digite seu nome materno" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>

                            </div>
                        </div>
                    </div>

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

                    <div class="field">
                        <label class="label">Sexo:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                <div class="select">
                                    <select id="sexo" name="sexo">
                                        <option>Selecione</option>
                                        <option>Masculino</option>
                                        <option>Feminino</option>
                                        <option>Outro</option>
                                    </select>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Digite seu CPF:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="cpf" name="cpf" type="text" placeholder="Digite seu CPF" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                <p class="help is-link">EX: 000.000.000-00</p>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Telefone Celular:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="telefoneCelular" name="telefoneCelular" type="tel" placeholder="Digite seu telefone celular"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                <p class="help is-link">EX:(+55)DD-000000000</p>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Telefone Fixo:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="telefoneFixo" name="telefoneFixo" type="tel" placeholder="Digite seu telefone fixo"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                <p class="help is-link">EX:(+55)DD-00000000</p>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Endereço Completo:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="endereco" name="endereco" type="text"
                                        placeholder="Digite seu endereço completo" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Digite seu CEP:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="cep" name="cep" type="text"placeholder="Digite seu CEP" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p class="help is-link">EX:00000-000</p>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Login:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="login" name="login" type="text" placeholder="Digite seu login" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-user-lock"></i>
                                    </span>
                                <p class="help is-link">O campo Login deve ter <span
                                        class="exatamente">exatamente</span> 6
                                    caracteres alfabéticos.</p>

                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Senha:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="senha" name="senha" type="password" placeholder="Digite sua senha"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                <p class="help is-link">O campo Senha <span class="exatamente"> deve ter 8 caracteres
                                        alfabéticos</span>.</p>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Confirme a Senha:</label>
                        <div class="field-body">
                            <div class="field">
                                <p class="control has-icons-left">
                                    <input class="input" id="confirmeSenha" name="confirmeSenha" type="password" placeholder="Confirme sua senha"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                <p class="help is-link">O campo Senha <span class="exatamente"> deve ter 8 caracteres
                                        alfabéticos</span>, idêntico ao primeiro.</p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="column">
                            <button class="button is-fullwidth is-medium" name="cadastro" id="cadastro" type="submit"
                                value="Submit input">Cadastre-se</button>
                        </div>
                        <div class="column">
                            <button class="button is-fullwidth is-medium" id="resetar" type="reset"
                                value="Submit input">Resetar formulário</button>
                        </div>
                    </div>
                </div>
            </div>
            <p class="subtitle is-6" id="pcop">© Telecall 2023 </p>
        </section>
    </form>
    <!--FINAL DO CADASTRO-->

    
    <script src="/telecall/assets/js/mobilemenu.js"></script>
    <script src="/telecall/assets/js/cadastro.js"></script>
</body>

</html>