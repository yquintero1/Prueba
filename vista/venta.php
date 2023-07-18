<?php
require_once '../conexion/con_bd.php';
error_reporting(E_ALL & ~E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Ventas</h1>
        <form action="../modelo/ventas.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="../vista/crear.php" class="btn btn-success">Crear Producto</a>
            <a href="../vista/listar.php" class="btn btn-warning">Stock</a>
        </form>
        
    </div>
</body>
</html>