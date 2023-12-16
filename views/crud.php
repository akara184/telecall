<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração - Telecall</title>
    <link rel="stylesheet" href="/telecall/assets/framework/bulma/bulma/css/bulma.css" />
    <link rel="icon" type="image/jpg" href="/telecall/assets/img/Untitled.png">
    <link rel="stylesheet" href="/telecall/assets/css/crud.css" />
    <link rel="stylesheet" href="/telecall/assets/vendors/fontawesome/css/all.css" />
    <link rel="stylesheet" href="/telecall/assets/vendors/swiper/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="/telecall/assets/vendors/aos/aos/dist/aos.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/nav.css">
    <link rel="stylesheet" href="/telecall/assets/layouts/acessibilidade.css">
    <script src="/telecall/assets/js/jquery-3.7.0.js.js"></script>
    <script src="/telecall/assets/js/acessibilidade.js"></script>
    <script src="/telecall/assets/framework/bulma/bulma/bulma-toast/dist/bulma-toast.min.js"></script>
    <script src="/telecall/assets/vendors/swiper/swiper/swiper-element-bundle.min.js"></script>
    <script src="/telecall/assets/vendors/aos/aos/dist/aos.js"></script>
</head>

<body>
    <?php

    require 'models/conexao.php';

    //Pegando todos usuarios
    $sql_users_count_query = "SELECT COUNT(*) as u FROM usuario";
    //executo o script
    $sql_users_count_query_exec = $mysqli->query($sql_users_count_query) or die($mysqli->error);
    //Transformo em números
    $users_count_sql = $sql_users_count_query_exec->fetch_assoc();
    //pego os números de paginas que existem
    $user_count = $users_count_sql['u'];

    //////////


    ////Paginação

    $start = 0;
    $rows_per_page = 10;


    $pages = ceil($user_count / $rows_per_page);

    //PEGANDO A PAGINA ATUAL
    if (isset($_GET['page'])) {
        $page = $mysqli->real_escape_string($_GET['page']);
    } else {
        $page = 1;
    }
    //CALCULOS DA PAGINAÇÃO
    $startNumber = ($page - 1) * $rows_per_page;
    //MOSTRANO NA TELA DE ACORDO COM A PAGINA ATUAL
    $query = "SELECT * FROM usuario ORDER BY id_usuario LIMIT $startNumber, $rows_per_page";
    $usuario_exec = $mysqli->query($query) or die($mysqli->error);

    ////////////////



    ///////////////
    ///////////////
    if (mysqli_num_rows($usuario_exec) > 0) {
    ?>
        <form action="" method="GET">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half mt-5">
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input" type="text" placeholder="Procure pelo nome ou login" name="procura">
                            </p>
                            <button type="submit" class="button is-info">
                                Procurar
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </form>



        <div class="container">
            <div class="column is-fullwidth">
                <a href="/telecall/crud/criarUsuario" class="has-text-white button is-link is-medium is-pulled-right" target="_self">ADICIONAR USUÁRIO</a>

                <h1 class="title is-2">Há <?= $user_count ?> usuários</h1>
                <table class="table is-bordered is-striped  is-hoverable is-fullwidth ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>SEXO</th>
                            <th>NASCIMENTO</th>
                            <th>LOGIN</th>
                            <th>TIPO PERFIL</th>
                            <th class="has-text-centered">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        //////////MOSTRANDO DADOS DADOS
                        if (!isset($_GET["procura"])) {


                            foreach ($usuario_exec as $usuarios) {
                        ?>
                                <tr>
                                    <th><?= $usuarios["id_usuario"]; ?></th>
                                    <th><?= $usuarios["nome"]; ?></th>
                                    <th><?= $usuarios["cpf"]; ?> </th>
                                    <th><?= $usuarios["sexo"]; ?></th>
                                    <th><?= $usuarios["data_nascimento"]; ?></th>
                                    <th><?= $usuarios["login"]; ?></th>
                                    <th><?= ($usuarios["fk_id_perfil"] == 1)? "Master": "Comum"; ?></th>

                                    <th>

                                        <a href="/telecall/crud/logPage?id=<?=$usuarios["id_usuario"]; ?>" class="has-text-light button is-link"> Log</a>

                                        <a href="/telecall/crud/updatePage?id=<?= $usuarios["id_usuario"]; ?>"class=" button is-warning has-text-dark "> Alterar</a>

                                        <a href="/telecall/models/deletePage.php?id=<?= $usuarios["id_usuario"]; ?>" class=" button is-danger has-text-light"> Deletar</a>

                                    </th>
                                </tr>
                            <?php

                            }
                        }
                        ///////////PESQUISA DE USUARIO SE CASO A URL CHAMAR A PROCURA
                        if (isset($_GET['procura'])) {
                            $procura = $mysqli->real_escape_string($_GET['procura']);
                            $sql_procura = "SELECT * FROM usuario WHERE nome LIKE '%$procura%' OR login LIKE '%$procura%'";
                            $sql_procura_query = $mysqli->query($sql_procura);

                            while ($dados = $sql_procura_query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <th><?= $dados["id_usuario"]; ?></th>
                                    <th><?= $dados["nome"]; ?></th>
                                    <th><?= $dados["cpf"]; ?></th>
                                    <th><?= $dados["sexo"]; ?></th>
                                    <th><?= $dados["data_nascimento"]; ?></th>
                                    <th><?= $dados["login"]; ?></th>
                                    <th><?= $dados["fk_id_perfil"]; ?></th>

                                    <th>

                                        <a href="/telecall/crud/logPage?id=<?= $dados["id_usuario"]; ?>" class="has-text-light button is-link"> Log</a>

                                        <a href="/telecall/crud/updatePage?id=<?= $dados["id_usuario"]; ?>"class=" button is-warning has-text-dark "> Alterar</a>

                                        <a href="/telecall/models/deletePage.php?id=<?= $dados["id_usuario"]; ?>" class=" button is-danger has-text-light"> Deletar</a>

                                    </th>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <ul class="pagination-list">
                <li>
                    <?php
                    for ($counter = 1; $counter <= $pages; $counter++) {

                    ?>
                        <a href='?page=<?php echo $counter ?>' class='pagination-link is-current'><?php echo $counter ?></a>

                    <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>

    <?php
    }
    ?>
    <!-- TENTATIVA FALHA DE FAZER PAGINAÇÃO  -->




    <script src="/telecall/assets/js/fade.js"></script>
    <script src="/telecall/assets/js/mobilemenu.js"></script>
    <script src="/telecall/assets/js/crud.js"></script>

</body>

</html>