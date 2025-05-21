<?php
class Database {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'catalogo';
    private $port = 3306;
    public $con;

    public function __construct() {
        $this->con = new mysqli(
            $this->host,
            $this->usuario,
            $this->senha,
            $this->banco,
            $this->port
        );

        if ($this->con->connect_error) {
            die("Erro de conexão: " . $this->con->connect_error);
        }
    }
}


?>
