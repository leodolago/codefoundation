<form method="post">
    <label>
    <input type="search" name="pesquisa" class="form-control">
    </label>
    <input type="submit" class="btn btn-success" value="Pesquisar">
</form>

<?php


if(isset($_POST['pesquisa'])) {
    require_once("src/Conn.php");

    $conexao = new Conn;
    $conn = $conexao->conectaPdo();

    $sql = "select * from paginas where conteudo like '%{$_POST['pesquisa']}%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
    //print_r($resultados);

    if($resultados !== array ()){
    echo "Pesquisa por ". $_POST['pesquisa']." encontrou os resultados abaixo:</br></br>";
    foreach ($resultados as $resultado) {

        echo $resultado->conteudo;
        echo "<br>Ir para página: <a href='{$resultado->pagina}'>" . $resultado->pagina . "</a>.<br><br>";
    }
    } else {
        echo "Pesquisa por ". $_POST['pesquisa']." não encontrou nada em nossas paginas! Desculpe.";
    }
}
