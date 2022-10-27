<?php
require_once '../Model/Model.php';

class Controller
{
    public $model;
    public function __construct()
    {
        
        $this->model = new Model();
    }
    public function mostrar()
    {
        $query = $this->model->getRegister();
        $registros = array();

        while($resultado = $query->fetch_array()){
            array_push($registros, ['id'=>$resultado['id_usuario'],'nombre' => $resultado['nombre_usuario'], 'edad' =>$resultado['edad_usuario'], 'telefono'=>$resultado['tel_usuario'], 'correo'=>$resultado['correo_usuario'], 'marca'=>$resultado['marca_nombre'], 'modelo'=>$resultado['modelo_nombre']]);    
        }

        header('Content-Type: application/json');
        echo json_encode($registros);
    }
    public function mostrarmarca()
    {
        $query = $this->model->getMarca();
        $registros = array();
        
        while($resultado = $query->fetch_array()){
            array_push($registros, ['id_marca'=>$resultado['id_marca'],'marca_nombre' => $resultado['marca_nombre']]);    
        }

        header('Content-Type: application/json');
        echo json_encode($registros);
        

    }

    public function mostrarmodeloselect($id)
    {
        $query = $this->model->getModeloSelect($id);
        $registros = array();
        
        while($resultado = $query->fetch_array()){
            array_push($registros, ['id_modelo'=>$resultado['id_modelo'],'modelo_nombre' => $resultado['modelo_nombre']]);    
        }

        header('Content-Type: application/json');
        echo json_encode($registros);
        

    }

    public function mostrarModelo($id) // $id = 5
    {
        $query = $this->model->getModelo($id);
        $registros = array();
        
        while($resultado = $query->fetch_array()){
            array_push($registros, ['id_modelo'=>$resultado['id_modelo'],'modelo_nombre' => $resultado['modelo_nombre']]);    
        }

        header('Content-Type: application/json');
        echo json_encode($registros);
    }

    public function registrar($nombre, $edad, $telefono, $correo, $modelo)
    {
        $query = $this->model->registerData($nombre, $edad, $telefono, $correo, $modelo);
        if($query){
            echo 'correcto';
        }else{
            echo 'error';
        }
    }

    public function editar($id, $nombre, $edad, $telefono, $correo, $modelo)
    {
        $query = $this->model->editarData($id, $nombre, $edad, $telefono, $correo, $modelo);
        if($query){
            echo 'correcto';
        }else{
            echo 'error';
        }
    }

    public function buscar($id) 
    {
        $query = $this->model->buscarData($id);
        $registros = array();

        while($resultado = $query->fetch_array()){
            array_push($registros, ['id'=>$resultado['id_usuario'],'nombre' => $resultado['nombre_usuario'], 'edad' =>$resultado['edad_usuario'], 'telefono'=>$resultado['tel_usuario'], 'correo'=>$resultado['correo_usuario'], 'marca'=>$resultado['id_marca'], 'modelo'=>$resultado['id_modelo']]);    
        }

        header('Content-Type: application/json');
        echo json_encode($registros);
    }

    public function eliminar($id)
    {
        $query = $this -> model->eliminarData($id);
        

        if($query){
            header('location: ../index.php');
        }
    }
}

$controllers = new Controller();

if(isset($_POST['tipo'])) { // Si existe la variable $_POST['tipo']
    $tipo = $_POST['tipo']; // $tipo = mostrar

    switch($tipo) {
        case 'mostrar':
            $controllers->mostrar();
            break;
        case 'mostrarmarca':
         $controllers->mostrarmarca();
        break;
        case 'mostrarmodeloselect':
            $controllers->mostrarModeloSelect($_POST['id']);
           break;
        case 'mostrarmodelo':
            $controllers->mostrarModelo($_POST['id']); // $_POST['id'] = 5
        break;
        case 'register':
            if(isset($_POST['idregistro']) && $_POST['idregistro'] != "") {
                $controllers->editar($_POST['idregistro'], $_POST['nombre'], $_POST['edad'], $_POST['telefono'], $_POST['correo'], $_POST['modelo']);
            } else {
                $controllers->registrar($_POST['nombre'], $_POST['edad'], $_POST['telefono'], $_POST['correo'], $_POST['modelo']);
            }
            break;

        case 'buscar':
            $controllers->buscar($_POST['id']);
            break;
    }
}

if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
    switch($tipo){
        case 'eliminar';
        $controllers->eliminar($_GET['id']);
        break;
    }
}