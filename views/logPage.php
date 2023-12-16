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
    $sql_users_count_query = "SELECT COUNT(*) as u FROM log";
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
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //PEGANDO A PAGINA ATUAL
    if (isset($_GET['page'])) {
        $page = $mysqli->real_escape_string($_GET['page']);
    } else {
        $page = 1;
    }

    //CALCULOS DA PAGINAÇÃO
    $startNumber = ($page - 1) * $rows_per_page;
    //MOSTRANO NA TELA DE ACORDO COM A PAGINA ATUAL
    $query = "SELECT * FROM log ORDER BY id_log LIMIT $startNumber, $rows_per_page";
    $logExec = $mysqli->query($query) or die($mysqli->error);

    ////////////////



    ///////////////
    ///////////////
    if (mysqli_num_rows($logExec) > 0) {
    ?>
        <div class="container">
            <div class="column is-fullwidth">
                <a href="/telecall/crud/criarUsuario" class="has-text-white button is-link is-medium is-pulled-right" target="_self">ADICIONAR USUÁRIO</a>

                <h1 class="title is-2">Há <?= $user_count ?> logs</h1>
                <table class="table is-bordered is-striped  is-hoverable is-fullwidth ">
                    <thead>
                        <tr>
                            <th>ID USUARIO</th>
                            <th>IP</th>
                            <th>DATA E HORA</th>
                            <th>LOGIN STATUS</th>
                            <th>ID LOG</th>
                            <th>Tipo de aut</th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        //////////MOSTRANDO DADOS DADOS
                        if (!isset($_GET["procura"])) {


                            foreach ($logExec as $usuarios) {
                        ?>
                                <tr>
                                    <th><?= $usuarios["fk_id_usuario"]; ?></th>
                                    <th><?= $usuarios["ip"]; ?></th>
                                    <th><?= $usuarios["data_hora"]; ?></th>
                                    <th><?= $usuarios["login_status"]; ?></th>
                                    <th><?= $usuarios["id_log"];?></th>
                                    <th>
                                        <?php
                                            switch ($usuarios["fk_id_autenticacao"]) {
                                                case 1:
                                                    echo "Nome da Mãe";
                                                    break;
                                                case 2:
                                                    echo "CEP";
                                                    break;
                                                case 3:
                                                    echo "Data de Nascimento";
                                                    break;
                                            }
                                        ?>
                                    </th>
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