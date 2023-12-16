    <?php
    ini_set('display_errors', "1");
    require "conexao.php";

    //IP
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip = intval($ip);
    //HORA INICIAL
    $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $formattedDateTime = $dt->format('Y/m/d H:i:s');


    //LOGIN STATUS
    $sucesso = "sucesso";
    $falha = "falha";

    //TIPO ATUTENTICACAO fk_id_autenticacao
    $nomeMae = 1;
    $cep = 2;
    $dataNascimento = 3;



    $getUsuario = filter_input(INPUT_GET, "login", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $getTipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $sql =  sprintf(
        "SELECT * FROM usuario 
                        WHERE login = '$getUsuario'",
        $mysqli->real_escape_string($getUsuario)
    );

    $result = $mysqli->query($sql);

    $usuario = $result->fetch_assoc();



    if ($getTipo == 1) {
        $getNomeMaterno = filter_input(INPUT_GET, "nomeMaterno", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($getNomeMaterno == $usuario["nome_materno"]) {

            $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";


            $stmt = $mysqli->stmt_init();


            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }

            $stmt->bind_param(
                "sssss",
                $ip,
                $formattedDateTime,
                $sucesso,
                $usuario["id_usuario"],
                $nomeMae
            );

            if ($stmt->execute()) {
                echo "2FA FEITO";
                header("Location: ../home");
            } else {
                die("PROBLEMA COM 2FA");
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            //Sessão agora recebe tals e tals
            $_SESSION["usuario"] = $usuario["id_usuario"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["login"] = $usuario["login"];
            $_SESSION["perfil"] = $usuario["fk_id_perfil"];
            
            header("Location: ../home");
        }else{
            if ($getNomeMaterno != $usuario["nome_materno"]) {

                $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";
    
    
                $stmt = $mysqli->stmt_init();
    
    
                if (!$stmt->prepare($sql)) {
                    die("SQL error: " . $mysqli->error);
                }
    
                $stmt->bind_param(
                    "sssss",
                    $ip,
                    $formattedDateTime,
                    $falha,
                    $usuario["id_usuario"],
                    $nomeMae
                );
    
                if ($stmt->execute()) {
                    echo "2FA NÃO FEITO";
                    header("Location: ../errorView");
                } else {
                    die("PROBLEMA COM 2FA");
                }
            }
        }
    }
    

    if ($getTipo == 2) {
        $getCep = filter_input(INPUT_GET, "cep", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($getCep == $usuario["cep"]) {

            $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";


            $stmt = $mysqli->stmt_init();


            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }

            $stmt->bind_param(
                "sssss",
                $ip,
                $formattedDateTime,
                $sucesso,
                $usuario["id_usuario"],
                $cep
            );

            if ($stmt->execute()) {
                echo "2FA FEITO";
                header("Location: ../home");
            } else {
                die("PROBLEMA COM 2FA");
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            //Sessão agora recebe tals e tals
            $_SESSION["usuario"] = $usuario["id_usuario"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["login"] = $usuario["login"];
            $_SESSION["perfil"] = $usuario["fk_id_perfil"];
            
            header("Location: ../home");
        }else{
            if ($getCep!= $usuario["cep"]) {

                $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";
    
    
                $stmt = $mysqli->stmt_init();
    
    
                if (!$stmt->prepare($sql)) {
                    die("SQL error: " . $mysqli->error);
                }
    
                $stmt->bind_param(
                    "sssss",
                    $ip,
                    $formattedDateTime,
                    $falha,
                    $usuario["id_usuario"],
                    $nomeMae
                );
    
                if ($stmt->execute()) {
                    echo "2FA NÃO FEITO";
                    header("Location: ../errorView");
                } else {
                    die("PROBLEMA COM 2FA");
                }
            }
        }
    }

    if ($getTipo == 3) {

        $getDataNascimento = filter_input(INPUT_GET, "dataDeNascimento", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($getDataNascimento == $usuario["data_nascimento"]) {

            $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";


            $stmt = $mysqli->stmt_init();


            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }

            $stmt->bind_param(
                "sssss",
                $ip,
                $formattedDateTime,
                $sucesso,
                $usuario["id_usuario"],
                $cep
            );

            if ($stmt->execute()) {
                echo "2FA FEITO";
                header("Location: ../home");
            } else {
                die("PROBLEMA COM 2FA");
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            //Sessão agora recebe tals e tals
            $_SESSION["usuario"] = $usuario["id_usuario"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["login"] = $usuario["login"];
            $_SESSION["perfil"] = $usuario["fk_id_perfil"];
            
            header("Location: ../home");
        }else{
            if ($getDataNascimento!= $usuario["data_nascimento"]) {

                $sql = "INSERT INTO log (ip, data_hora, login_status,fk_id_usuario,fk_id_autenticacao) VALUES (?,?,?,?,?)";
    
    
                $stmt = $mysqli->stmt_init();
    
    
                if (!$stmt->prepare($sql)) {
                    die("SQL error: " . $mysqli->error);
                }
    
                $stmt->bind_param(
                    "sssss",
                    $ip,
                    $formattedDateTime,
                    $falha,
                    $usuario["id_usuario"],
                    $nomeMae
                );
    
                if ($stmt->execute()) {
                    echo "2FA NÃO FEITO";
                    header("Location: ../errorView");
                } else {
                    die("PROBLEMA COM 2FA");
                }
            }
        }
    }


    ?>