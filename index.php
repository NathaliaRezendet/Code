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
        <!-- Formulário para inserir nome -->
        <div class="form-container">
            <h2>Adicionar Nome</h2>
            <form method="POST" action="">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <button type="submit">Adicionar</button>
            </form>
        </div>

        <!-- Mensagem de sucesso -->
        <div class="mensagem-sucesso">
            <?php
                // Incluir o arquivo de conexão com o banco de dados
                include("conexao.php");

                // Verificar se o formulário foi enviado
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Verificar se o campo "nome" está preenchido
                    if (!empty($_POST['nome'])) {
                        // Obter o nome do formulário
                        $nome = $_POST['nome'];

                        // Inserir o nome na tabela
                        $queryInsert = "INSERT INTO cancel (canNome) VALUES ('$nome')";
                        if ($mysqli->query($queryInsert) === TRUE) {
                            echo "<p>Nome '$nome' inserido com sucesso na tabela.</p>";
                        } else {
                            echo "Erro ao inserir nome: " . $mysqli->error;
                        }
                    } else {
                        echo "<p>O campo nome é obrigatório.</p>";
                    }
                }
            ?>
        </div>

        <!-- Seleção de IDs e Nomes -->
        <div class="select-container">
            <?php
                // Query SQL para selecionar canID da tabela cancel
                $queryID = "SELECT canID FROM cancel";
                $resultID = $mysqli->query($queryID);

                // Verificar se a consulta retornou resultados para canID
                if ($resultID->num_rows > 0) {
                    echo '<div class="select-box">';
                    echo '<label for="opcaoID">Selecione o ID:</label>';
                    echo '<select id="opcaoID" name="opcaoID">';
                    // Iterar sobre os resultados e criar as opções do select para canID
                    while ($row = $resultID->fetch_assoc()) {
                        echo '<option value="' . $row['canID'] . '">' . $row['canID'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                } else {
                    echo "Não há IDs para exibir.";
                }

                // Query SQL para selecionar canNome da tabela cancel
                $queryNome = "SELECT canNome FROM cancel";
                $resultNome = $mysqli->query($queryNome);

                // Verificar se a consulta retornou resultados para canNome
                if ($resultNome->num_rows > 0) {
                    echo '<div class="select-box">';
                    echo '<label for="opcaoNome">Selecione o Nome:</label>';
                    echo '<select id="opcaoNome" name="opcaoNome">';
                    // Iterar sobre os resultados e criar as opções do select para canNome
                    while ($row = $resultNome->fetch_assoc()) {
                        echo '<option value="' . $row['canNome'] . '">' . $row['canNome'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                } else {
                    echo "Não há nomes para exibir.";
                }
            ?>
        </div>
    </div>
</body>
</html>
