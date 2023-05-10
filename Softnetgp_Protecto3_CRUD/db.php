<?php
session_start();

$conn = mysqli_connect(
  'localhost:3306',
  'root',
  '',
  'proyecto3'
) or die(mysqli_erro($mysqli));

if (isset($conn)) {
  echo 'Conexion exitosa a la base de datos...' ;
}

?>