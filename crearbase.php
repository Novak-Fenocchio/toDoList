<?php
// Start the session
session_start();
?>  

<?php 
    include_once 'conection.php';
    $nombre = $_SESSION['user'];

    $crearbd= "CREATE TABLE IF NOT EXISTS `{$nombre}` (
    `id` int(255) NOT NULL,
        `nameTask` varchar(255) NOT NULL,
        `task` varchar(255) NOT NULL,
        `stateTask` varchar(255) NOT NULL,
        `statusTask` text NOT NULL,
        `dateTask` date NOT NULL,
        `user` varchar(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        // Se verifica si la tabla ha sido creado
    if ($conn->query($crearbd) === TRUE) {
        echo "la tabla alumnos ha sido creado";
    } else {
        echo "Hubo un error al crear la tabla alumnos: " . $conn->error;
    }

    $user = $_SESSION['user'];
    echo $user;
    header('location:index.php');
?>


