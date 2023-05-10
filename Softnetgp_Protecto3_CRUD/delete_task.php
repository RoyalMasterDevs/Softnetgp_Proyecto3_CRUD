<?php

include("db.php");

if(isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "DELETE FROM clientes WHERE id_cliente = $id_cliente";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error al BORRAR...");
  }

  $_SESSION['message'] = 'Registro borrado con exito...';
  $_SESSION['message_type'] = 'Error...';
  header('Location: index.php');
}

?>