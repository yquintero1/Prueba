<!DOCTYPE html>
<html>
<head>
    <title>Guardar Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Crear Producto</h1>
        <div class="table-responsive">    
            <table class="table table-bordered">
                <form method="post" action="../modelo/stock.php">
                    <tr>
                        <td><label for="id">ID:</label></td>
                        <td><input type="number" name="id" id="id" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="nombre">Nombre:</label></td>
                        <td><input type="text" name="nombre" id="nombre" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="referencia">Referencia:</label></td>
                        <td><input type="text" name="referencia" id="referencia" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="precio">Precio:</label></td>
                        <td><input type="number" name="precio" id="precio" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="peso">Peso:</label></td>
                        <td><input type="number" name="peso" id="peso" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="categoria">Categoría:</label></td>
                        <td><input type="text" name="categoria" id="categoria" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="stock">Stock:</label></td>
                        <td><input type="number" name="stock" id="stock" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="fecha_creacion">Fecha de Creación:</label></td>
                        <td><input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-success">Guardar Producto</button>                            
                            <a href="../vista/listar.php" class="btn btn-primary">Stock</a>
            
                        </td>
                    </tr>
                </form>
            </table>
            
        </div>
    </div>
</body>
</html>