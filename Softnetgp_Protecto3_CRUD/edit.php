<?php
include("db.php");
$nombre = '';
$direccion= '';
$telefono= '';

if  (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "SELECT * FROM clientes WHERE id_cliente=$id_cliente";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
  }
}
echo 'Termino de mostrar datos...' ;

if (isset($_POST['update'])) {
  echo 'Entro a UPDATE...' ;
  $id_cliente = $_GET['id_cliente'];
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];

  $query = "UPDATE clientes set nombre = '$nombre', direccion = '$direccion', $telefono = '$telefono' WHERE id_cliente=$id_cliente";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Datos actualizados correctamente';
  $_SESSION['message_type'] = 'Precaucion';
  header('Location: index.php');
}

echo 'Salio de UPDATE...' ;


?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id_cliente']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualiza Nombre">
        </div>
        <div class="form-group">
          <textarea name="direccion" class="form-control" cols="30" rows="2" placeholder="Actualiza Direccion"><?php echo $direccion;?></textarea>
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualiza Celular">
        </div>
        <button class="btn-success" name="update">
          update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>