<?php
    include_once 'conection.php';
    include_once 'register2.php';
    //Declare the array with the List of Tasks
    $details_users = array();
    //Make a array with the tasks and I put them in the array of the lists 
    while($details_users_array = $resultado->fetch_assoc())
    {   $details_users_array = array(
        'id' => $details_users_array['id'],
        'nameUSer' => $details_users_array['nameUser'],
        'passwordUser' => $details_users_array['passwordUser'],            
    );
    $details_users[] = $details_users_array;
    };    

    foreach($details_users as $detail_user){
        echo '<br>';
        echo 'password of the database is ';
        echo $detail_user['passwordUser'];

        if($password == $detail_user['passwordUser'])
    {        
        header('location:index.php');
    }else
    {
        header('location:sesiones2.php');
    }
    };
    $conn->close();

?>

