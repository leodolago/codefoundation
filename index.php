<?php

require_once 'src/Conn.php';

$conexao = new Conn;
$conexao->conectaPdo();

$m_rotas= [
    home,
    produtos,
    servicos,
    empresa,
    contato,
    pesquisa
];

$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$path = substr($rota['path'], 1);

/** $path = str_replace("/","",$rota['path']); */

function verifica_rota($v_path, $v_rotas){
    if (!in_array($v_path, $v_rotas)) {
        return true;
    }
};

if (verifica_rota($path, $m_rotas)){
 http_response_code(404);
    $path = "404";
}

?>

    <html>
<head>

    <link rel="stylesheet" type="text/css" href="css/meustylo.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?php require_once("menu.php"); ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <?php require_once($path.".php"); ?>
    </div>
    <div class="col-sm-4"></div>
</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?php require_once("rodape.php"); ?>
    </div>
    <div class="col-sm-1"></div>
</div>
</body>
<footer>

</footer>
</html>

