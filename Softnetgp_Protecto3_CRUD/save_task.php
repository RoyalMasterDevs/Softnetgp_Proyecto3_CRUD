<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  
  $query = "INSERT INTO clientes(nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";
  
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Datos agregados correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>