<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/Logo1.png">
    <link rel="stylesheet" href="./index.css">
    <title>Play Fibra</title>
</head>

<body>
    <!-- Cabeçalho -->
    <header>
        <img src="./images/playfibra1.png" alt="Logo">
    </header>

    <!-- Conteúdo Principal -->
    <div class="conteudo">
        <!-- Formulário para inserir novo registro -->
        <div class="form-container">
            <h2>Adicionar Novo Registro</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>
                <button type="submit">Adicionar</button>
            </form>
        </div>

        <!-- Lista de registros -->
        <div class="registros">
            <?php include("listar_registros.php"); ?>
        </div>
    </div>
    <?php
    include("conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar se todos os campos foram enviados
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cidade'])) {
            // Obter os dados do formulário
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cidade = $_POST['cidade'];

            // Inserir os dados na tabela
            $queryInsert = "INSERT INTO novos (nome, email, cidade) VALUES ('$nome', '$email', '$cidade')";
            if ($mysqli->query($queryInsert) === TRUE) {
                echo "<p>Registro inserido com sucesso.</p>";
            } else {
                echo "Erro ao inserir registro: " . $mysqli->error;
            }
        } else {
            echo "<p>Por favor, preencha todos os campos.</p>";
        }
    }
    ?>


    <!-- Modal de edição -->
    <?php include("modal_edicao.php"); ?>

    <!-- Script JavaScript para interações do usuário -->
    <script>
        function openEditModal(id, nome, email, cidade) {
            document.getElementById('editID').value = id;
            document.getElementById('editNome').value = nome;
            document.getElementById('editEmail').value = email;
            document.getElementById('editCidade').value = cidade;
            var editModal = document.getElementById('editModal');
            editModal.style.display = 'block';
        }
    </script>
</body>

</html>


<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteID'])) {
    // Verificar se o ID a ser excluído foi enviado
    $deleteID = $_POST['deleteID'];

    // Preparar e executar a consulta para excluir o registro
    $queryDelete = "DELETE FROM novos WHERE id = $deleteID";
    if ($mysqli->query($queryDelete)) {
        echo "<p>Registro excluído com sucesso.</p>";
    } else {
        echo "Erro ao excluir registro: " . $mysqli->error;
    }
}

$query = "SELECT * FROM novos";
$result = $mysqli->query($query);


?>