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

if ($result->num_rows > 0) {
    echo "<h2>Registros</h2>";
    echo '<div class="table-container">';
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Cidade</th><th>Ação</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["cidade"] . "</td>";
        echo "<td>";
        echo '<form method="POST" action=""><input type="hidden" name="deleteID" value="' . $row["id"] . '"><button type="submit" class="delete-button">Excluir</button></form>';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo '</div>'; // Fechar a div .table-container
} else {
    echo "<p>Não há registros para exibir.</p>";
}
