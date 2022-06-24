<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idusuario, email, password FROM usuario WHERE idusuario = :idusuario');
    $records->bindParam(':idusuario', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Click por mi planeta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <br><br><br>

    <?php if(!empty($user)): ?>

    <!-- //INICIO DE APP  -->

    <?php require_once 'process.php'; ?>
    <?php $con = new mysqli("localhost","root","","budget_calculator"); ?>
    <?php  if(isset($_SESSION['message'])): ?>


    <?php endif ?> 
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center">Cantidad de archivos eliminados</h2>
                <hr><br>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="budgetTitle">Servicio</label>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="budget" class="form-control" id="budgetTitle" placeholder="Dónde eliminaste información" required autocomplete="off"  value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Cantidad en Gigas</label>
                        <input type="number" name="amount" step="any" class="form-control" id="amount" placeholder="GB Eliminadas" required  value="<?php echo $amount; ?>">
                    </div>
                    <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Actualizar</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Agregar</button>
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Contribución al medio ambiente : $ <?php echo $total;?></h2>
                <hr>
                <br><br>

                <?php 

                    if(isset($_SESSION['massage'])){
                        echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                    <strong> {$_SESSION['massage']} </storng>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                    }

                ?>
                <h2>Registro de eliminación de basura digital</h2>

                <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM budget");
                ?>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Cantidad en GB</th>
                                <th colspan="2">Acción</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td> $<?php echo $row['amount']; ?></td>
                                <td>
                                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-success">Actualizar</a>
                                    <a href="process.php?delete=<?php echo $row['id']; ?>"  class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                            

                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


      <!-- ///FIN DE APP -->

      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
