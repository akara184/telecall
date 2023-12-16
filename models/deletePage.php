<?php
require "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM usuario where id_usuario = '$id'";

    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        die("Query Faield" . mysqli_error($mysqli));
    } else {
        header('Location: ../crud');
    }
}
