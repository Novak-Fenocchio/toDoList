<?php 

    $conn = new mysqli('localhost', 'root', '', 'toDoList');
    if($conn->connect_error)
    {
        echo 'Something fail.aa';
    }
?>