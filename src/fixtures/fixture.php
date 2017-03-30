<?php

$conecta = include '../config/configDB.php';

$user = $conecta['dbAces']['user'];
$pass = $conecta['dbAces']['pass'];
$host = $conecta['dbAces']['host'];

$dns = "mysql:host={$host};";

try {
    $conex = new \PDO($dns, $user, $pass);
} catch (PDOException $ex) {
    echo "A conexão com db falhou: " . $ex->getMessage();
}

echo "- Executando fixture</br></br>";

$sql = "CREATE DATABASE IF NOT EXISTS codefoundation;";

$stmt = $conex->prepare($sql);
$stmt->execute();

require_once '../Conn.php';

$conexao = new Conn();
$conn = $conexao->conectaPdo();

$paginas = [
    0 => array(
        "pagina" => "home",
        "conteudo" => "Esta é a home page. Apenas mais um projeto para estudo de php",
    ),
    1 => array(
        "pagina" => "empresa",
        "conteudo" => "Esta é nossa empresa. Empresa original com qualidade",
    ),
    2 => array(
        "pagina" => "produtos",
        "conteudo" => "Só trabalhamos com produtos originais.",
    ),
    3 => array(
        "pagina" => "servicos",
        "conteudo" => "Aqui você encontra serviços com qualidade e confiança."),
    ];

echo "- Limpando BD</br>";

$conn->query("DROP TABLE IF EXISTS clientes;");
$conn->query("DROP TABLE IF EXISTS paginas;");


echo "- Criando tabelas</br>";

// Cria a tabela de clientes
$conn->query("CREATE TABLE clientes (
     id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(255) CHARACTER SET 'utf8' NULL,
email VARCHAR(255) CHARACTER SET 'utf8' NULL,
telefone VARCHAR(45) CHARACTER SET 'utf8' NULL,
criado TIMESTAMP,
alterado TIMESTAMP,
PRIMARY KEY (id));");

// Cria a tabela de paginas
$conn->query("CREATE TABLE paginas (
id INT NOT NULL AUTO_INCREMENT,
pagina VARCHAR(255) CHARACTER SET 'utf8' NULL,
conteudo LONGTEXT CHARACTER SET 'utf8' NULL,
criado TIMESTAMP,
alterado TIMESTAMP,
PRIMARY KEY (id));");

echo "- Inserindo dados</br>";

// Insere os dados na tabela de clientes
for ($x = 0; $x <= 9; $x++) {
    $nome = "Cliente{$x}";
    $email = "cliente{$x}@cliente.com";
    $telefone = "11 99753567{$x}";

    $smt = $conn->prepare("INSERT INTO clientes (nome, email, telefone) VALUE (:nome, :email, :telefone)");
    $smt->bindParam(":nome", $nome);
    $smt->bindParam(":email", $email);
    $smt->bindParam(":telefone", $telefone);
    $smt->execute();
};

// Insere os dados na tabela de pagina
$stmt = $conn->prepare('INSERT INTO paginas (pagina, conteudo) VALUES (:pagina, :conteudo)');

foreach($paginas as $pag){
    $stmt->execute(array( ':pagina' => $pag['pagina'], ':conteudo' => $pag['conteudo'] ));

};