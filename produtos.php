<?php

require_once 'src/Conn.php';

$page = 'produtos';

$conexao = new Conn;
$conn = $conexao->conectaPdo();

$sql = "SELECT * FROM paginas WHERE pagina = :pagina";
$stmt = $conn->prepare($sql);
$stmt->bindValue("pagina", $page);
$stmt->execute();
$mostra = $stmt->fetch(PDO::FETCH_OBJ);

?>
<h3><?php echo $mostra->pagina;?></h3>
<p><?php echo $mostra->conteudo;?></p>
