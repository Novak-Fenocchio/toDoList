<?php 
    session_start();
    include_once 'conection.php';

    $titleTask = $_POST['nameTask'];
    $contentTask = $_POST['task'];
    $statusTask = $_POST['status'];
    $dateTask = $_POST['date'];
    $username = $_SESSION['user'];
   echo $dateTask;

    $prueba = 'nameTask';
    $id= '1';
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    } 
    $sql_agregar = "INSERT INTO tasks(nameTask,task,statusTask,dateTask,user) VALUES ('$titleTask', '$contentTask', '$statusTask', '$dateTask', '$username')";

    if (mysqli_query($conn, $sql_agregar)) {
       echo "Registro ingresado correctamente";
       echo $statusTask;

    } else {
       echo "Error: " . $sql_agregar . "" . mysqli_error($conn);
    }
    $conn->close();
     header('location:index.php');
 
?>