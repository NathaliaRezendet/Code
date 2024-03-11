<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editID"])) {
    $id = $_POST["editID"];
    $novo_nome = $_POST["editNome"];

    // Atualizar o nome do registro no banco de dados
    $queryUpdate = "UPDATE novos SET nome='$novo_nome' WHERE id=$id";

    if ($mysqli->query($queryUpdate) === TRUE) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar registro: " . $mysqli->error;
    }
}
?>
