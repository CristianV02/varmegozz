<?php
ini_set("log_errors", 1);
date_default_timezone_set('America/Bogota');

class Conexion extends PDO
{
    private $tipo_de_base = 'mysql';
    private $host = 'mysql-cluster-0-mysql-master.database.svc.cluster.local:3306';
    private $nombre_de_base = '770679_bdd8486392a30c3e1171e2973f4a5d95';
    private $usuario = 'goldecop-bf295a';
    private $contrasena = 'C-pkzL3MaPVYgI11UKF6';

    public function __construct()
    {
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }
}
