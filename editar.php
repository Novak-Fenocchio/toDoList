<?php 

    include_once 'conection.php';

/*     $titleTask = $_GET['nameTask'];
    $contentTask = $_GET['task'];
 */ $prsueba = 'nameTask';
    $id= $_GET['id'];


    $state= 'complete';
    $bd = 'tasks';

    $sql_editar = "UPDATE {$bd} SET stateTask='{$state}' WHERE id={$id}";


    if (mysqli_query($conn, $sql_editar)) {
        echo "Registro editado correctamente";
     } else {
        echo "Error: " . $sql_editar . "" . mysqli_error($conn);
     }
    header('location:index.php');
 

?>