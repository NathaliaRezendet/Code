<?php
// Código HTML para o modal de upload
echo '<div class="modal-content">';
echo '<span class="close">&times;</span>';
echo '<h2>Upload de Arquivo Excel</h2>';
echo '<form id="formUpload" method="POST" action="upload.php" enctype="multipart/form-data">';
echo '<input type="file" id="excelFile" name="excelFile" accept=".xls,.xlsx" required>';
echo '<button type="submit">Enviar</button>';
echo '</form>';
echo '</div>';
?>
