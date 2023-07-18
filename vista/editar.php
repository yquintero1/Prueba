<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
<?php
require_once '../conexion/con_bd.php';
error_reporting(E_ALL & ~E_WARNING);
if (isset($_GET['ide'])) {
    $ide = $_GET['ide'];
    echo "Valor de ide: " . $ide;
} else {
    echo "No se recibió el valor de ide.";
}

global $conexion;

$consulta = "SELECT * FROM productos where id=$ide";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    echo '<form action="../modelo/stock.php?iden=1&ide=' . $ide . '" method="POST">';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nombre de producto</th>';
    echo '<th>Referencia</th>';
    echo '<th>Precio</th>';
    echo '<th>Peso</th>';
    echo '<th>Categoría</th>';
    echo '<th>Stock</th>';
    echo '<th>Fecha de creación</th>';
    echo '<th>Eliminar</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila["id"] . '</td>';
        echo '<td><input type="text" name="nombre_producto" value="' . $fila["nombre_producto"] . '"></td>';
        echo '<td><input type="text" name="referencia" value="' . $fila["referencia"] . '"></td>';
        echo '<td><input type="text" name="precio" value="' . $fila["precio"] . '"></td>';
        echo '<td><input type="text" name="peso" value="' . $fila["peso"] . '"></td>';
        echo '<td><input type="text" name="categoria" value="' . $fila["categoria"] . '"></td>';
        echo '<td><input type="text" name="stock" value="' . $fila["stock"] . '"></td>';
        echo '<td><input type="text" name="fecha_creacion" value="' . $fila["fecha_creacion"] . '"></td>';
        echo '<td><a href="../modelo/stock.php?id=' . $fila["id"] . '" class="btn btn-danger">Eliminar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '<input type="submit" value="Guardar cambios" class="btn btn-primary">';
    echo '</form>';
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>