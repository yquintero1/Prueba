<?php
require_once '../conexion/con_bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $conexion;
    
    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];    
    $sql = "SELECT stock FROM productos WHERE id = '$id'";
    $result = $conexion->query($sql);
  
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $stock = $row["stock"];
      
  
      
      if ($cantidad <= $stock) {
        $nuevo_stock = $stock - $cantidad;
        $sqli = "INSERT INTO venta (id_prod,cantidad)VALUES ('$id', '$cantidad')";
        if (mysqli_query($conexion, $sqli)) {
            header("Location: ../index.php");
           
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
        $sql_update = "UPDATE `productos` p 
        INNER JOIN `venta` v ON v.id_prod = p.id 
        SET p.stock = '$nuevo_stock' 
        WHERE p.id = $id";
     if (mysqli_query($conexion, $sql_update)) {         
        
        header("Location: ../index.php");

} else {
    echo "Error de actualizacion: " . mysqli_error($conexion);
}
    
    
       
      } else {
        echo "No hay suficiente stock disponible para esa cantidad.";
      }
    } else {
      echo "No se encontró el producto con el ID especificado.";
    }
  
    $conexion->close();
  }

?>