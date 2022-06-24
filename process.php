<?php

session_start();

require 'database.php';

$con = new mysqli("localhost","root","","budget_calculator");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


$total = 0;
$update = false;
$id=0;
$name = '';
$amount = '';
$idusuario = '';

    if(isset($_POST['save'])){
       
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];
        $idusuario = $_POST['idusuario'];

        $query = mysqli_query($con, "INSERT INTO budget (idusuario, name, amount) VALUES ('$idusuario', '$budget', '$amount')");
        
        $_SESSION['massage'] = "Registro Agregado !";
        $_SESSION['msg_type'] = "primary";

        header("location: index.php?result=true");
        

    }

    //calculate Total budget
    $result = mysqli_query($con, "SELECT * FROM budget WHERE idusuario = 8;");
    while($row = $result->fetch_assoc()){
        $total = $total + $row['amount'];
    }

    //delete data

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM budget WHERE id=$id");
        $_SESSION['massage'] = "Registro eliminado";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM budget WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $amount = $row['amount'];
        }
    
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];

        $query = mysqli_query($con, "UPDATE budget SET name='$budget', amount='$amount' WHERE id='$id'");
        $_SESSION['massage'] = "Registro Actualizado";
        $_SESSION['msg_type'] = "success";
        header("location: index.php");
    }


?>

