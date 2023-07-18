<?php
error_reporting(E_ALL & ~E_WARNING);
require_once '../conexion/con_bd.php';

//crear un nuevo producto
function crearProducto($id,$nombre, $referencia, $precio, $peso, $categoria, $stock, $fecha_creacion)
{
    global $conexion;

    $sql = "INSERT INTO productos (id,nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion)
            VALUES ('$id', '$nombre', '$referencia', $precio, $peso, '$categoria', $stock, '$fecha_creacion')";

    if (mysqli_query($conexion, $sql)) {
        echo "Producto creado correctamente.";
        header("Location: ../index.php");
    } else {
        echo "Error al crear el producto: " . mysqli_error($conexion);
    }
}

//editar un producto existente
function editarProducto($id, $nombre, $referencia, $precio, $peso, $categoria, $stock, $fecha_creacion)
{
    global $conexion;

    $sql = "UPDATE productos SET nombre_producto='$nombre', referencia='$referencia', precio=$precio, peso=$peso, categoria='$categoria',
            stock=$stock, fecha_creacion='$fecha_creacion' WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        echo "Producto actualizado correctamente.";
        header("Location: ../index.php");
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }
}

// eliminar un producto
function eliminarProducto($id)
{
    global $conexion;

    $sql = "DELETE FROM productos WHERE id=$id";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Producto eliminado correctamente');</script>";
        header("Location: ../index.php");
        
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }
}

// listar los productos
function listarProductos(){
    global $conexion;
    $consulta = "SELECT * FROM productos";
    $resultado = $conexion->query($consulta);
    
    if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
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
        echo '<th>Editar</th>';
        echo '<th>Eliminar</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila["id"] . '</td>';
            echo '<td>' . $fila["nombre_producto"] . '</td>';
            echo '<td>' . $fila["referencia"] . '</td>';
            echo '<td>' . $fila["precio"] . '</td>';
            echo '<td>' . $fila["peso"] . '</td>';
            echo '<td>' . $fila["categoria"] . '</td>';
            echo '<td>' . $fila["stock"] . '</td>';
            echo '<td>' . $fila["fecha_creacion"] . '</td>';
            echo '<td class="text-center"><a href="../vista/editar.php?ide=' . $fila["id"] . '" class="btn btn-primary">Editar</a></td>';
            echo '<td class="text-center"><a href="../modelo/stock.php?id=' . $fila["id"] . '" class="btn btn-danger">Eliminar</a></td>';
            echo '</tr>';
        }
    
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron resultados.";
    }
    
    $conexion->close();
    echo '<table class="table">';
    echo '<tr>';
    echo '<td colspan="2" class="text-center">';
    echo '<a href="../vista/crear.php" class="btn btn-primary">Crear Producto</a>';
    echo '<a href="../vista/venta.php" class="btn btn-success">Crear Venta</a>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';
}
$iden = $_GET['iden'];
if( $iden == 1 ){

if ($_SERVER["REQUEST_METHOD"] == "POST"  ) {
   
    $id = $_GET['ide']; 
    $nombre = $_POST['nombre_producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fecha_creacion = $_POST['fecha_creacion'];    
    editarProducto($id, $nombre, $referencia, $precio, $peso, $categoria, $stock, $fecha_creacion);
}
}

else{


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fecha_creacion = $_POST['fecha_creacion'];    
    crearProducto($id,$nombre, $referencia, $precio, $peso, $categoria, $stock, $fecha_creacion);
    
}
}
if (isset($_GET['id'])) {   
    $id = $_GET['id'];
    
    eliminarProducto($id);
}


listarProductos()

?>