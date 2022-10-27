<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/estilos.css">
    <title>Document</title>

    <nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="">
      <img src="src/img/logo.png" alt="Logo" width="90" height="24" class="d-inline-block align-text-top">
      
    </a>
  </div>
</nav>

</head>
<body>
    <div class="container">
    <div class="card mt-3" id="formulario">
        <div class="card-header">
        Registro de Clientes
        </div>
        <div class="card-body">
            <form class="form" id="formRegister">
            <input type="hidden" name="idregistro" id="idregistro">
            <div class="mb-3">
            <input type="text" class ="form-control" name="nombre" id="nombre" placeholder="Nombre Completo">
            </div>
            <div class="mb-3">
            <input type="text" class ="form-control" name="edad" id="edad" placeholder="Edad">
            </div>
            <div class="mb-3">
            <input type="text" class ="form-control" name="telefono" id="telefono" placeholder="Telefono">
            </div>
            <div class="mb-3">
            <input type="text" class ="form-control" name="correo" id="correo" placeholder="Correo Electrónico">
            </div>
            <div class="mb-3">
            <select class="form-select" name="marca" id="marca" aria-label="Default select example">
                <option selected disabled>--Selecciona una Marca--</option>
            </select>
            </div>
            <div class="mb-3">
            <select class="form-select" name="modelo" id="modelo" aria-label="Default select example">
            <option selected disabled>----</option>
            </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-danger"value="Registrar">
            </div>
            </form>
        </div>
    </div>

    <div class="honda">
    <img src="src/img/honda.png" class="honda">
    </div>
    <div class="kia">
    <img src="src/img/kia.png" class="kia">
    </div>
    <div class="ford">
    <img src="src/img/ford.png" class="ford">
    </div>
    <div class="nissan">
    <img src="src/img/nissan.png" class="nissan">
    </div>
   

    <div class="card mb-5" id="tabla">
        <div class="card-header">Lista de Registros</div>
        <div class="card-body">
           <table class ="table">
               <thead>
                   <tr>
                       <th>Nombre</th>
                       <th>Edad</th>
                       <th>Telefono</th>
                       <th>Correo Electrónico</th>
                       <th>Marca</th>
                       <th>Modelo</th>
                       <th></th>
                       <th></th>
                   </tr>
               </thead>
               <tbody>
                   
               </tbody>
           </table>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="src/js/app.js"></script>
</body>
</html>