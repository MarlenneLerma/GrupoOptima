<?php
require_once '../server/Connection.php';

class Model{
    public $db;
    public $dbconnect;

    public function __construct()
    {
        $this->db = new Connection();
        $this->dbconnect = $this->db->connection();
    }

    public function getRegister()
    {
        $query = $this->dbconnect->query("SELECT u.id_usuario, u.nombre_usuario, u.edad_usuario, u.tel_usuario, u.correo_usuario, mo.modelo_nombre, ma.marca_nombre FROM autos_usuarios u INNER JOIN modelo mo ON mo.id_modelo = u.id_modelo INNER JOIN marca ma ON ma.id_marca = mo.id_marca");
        return $query;
    }

    public function getMarca()
    {
        $query = $this->dbconnect->query("SELECT id_marca, marca_nombre FROM marca");
        return $query;
    }

    public function getModeloSelect($id)
    {
        $query = $this->dbconnect->query("SELECT id_modelo, modelo_nombre FROM modelo WHERE id_marca = '$id'");
        return $query;
    }

    public function getModelo($id)
    {
        $query = $this->dbconnect->query("SELECT id_modelo, modelo_nombre FROM modelo WHERE id_marca = '$id' ");
        return $query;
    }

    public function registerData($nombre, $edad, $telefono, $correo, $modelo)
    {
        $query = $this->dbconnect->query("INSERT INTO autos_usuarios (nombre_usuario,edad_usuario,tel_usuario,correo_usuario, id_modelo) VALUES ('$nombre','$edad','$telefono','$correo','$modelo')");
        return $query;
    }

    public function eliminarData($id)
    {
        $query = $this->dbconnect->query("DELETE FROM autos_usuarios WHERE id_usuario= '$id'");
        return $query;
    }

    public function buscarData($id)
    {
        $query = $this->dbconnect->query("SELECT u.*, mo.id_marca FROM autos_usuarios u INNER JOIN modelo mo ON mo.id_modelo = u.id_modelo WHERE id_usuario = '$id'");
        return $query;
    }

    public function editarData($id, $nombre, $edad, $telefono, $correo, $modelo)
    {
        $query = $this->dbconnect->query("UPDATE autos_usuarios SET nombre_usuario = '$nombre', edad_usuario = '$edad', tel_usuario = '$telefono', correo_usuario = '$correo', id_modelo = '$modelo' WHERE id_usuario = '$id'");
        return $query;
    }
}
