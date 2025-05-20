<?php
$host = 'localhost';
$usuario = 'root';
$senha = ' ';
$banco = 'catalogo';


$con = new mysqli($host, $usuario, $senha, $banco);


if($con->connect_error) {
    die("Erro de conexão: ". $con->connect_error);

}
?>
