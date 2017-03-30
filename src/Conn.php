<?php

class Conn
{
    public function conectaPdo()
    {

        $conecta = include 'config/configDB.php';

        $user = $conecta['dbAces']['user'];
        $pass = $conecta['dbAces']['pass'];
        $dbname = $conecta['dbAces']['dbname'];
        $host = $conecta['dbAces']['host'];

        $dns = "mysql:host={$host};dbname={$dbname};";

        try {
           return  new \PDO($dns, $user, $pass);
        } catch (PDOException $ex) {
            echo "A conexão com db falhou: " . $ex->getMessage(). " <br>Configure o arquivo configDB.php com o seu user e password e utileze dbname 'codefoundation'. Depois clique no menu fixture abaixo";
        }
    }
}