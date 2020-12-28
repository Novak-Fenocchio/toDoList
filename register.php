<?php 
    session_start();
    include_once 'conection.php';
    $user = $_SESSION['user'];
    $password = $_SESSION['password'];
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     } 

     
     /*      $sql_agregar = " INSERT INTO users(nameUser,passwordUser) SELECT '$user', '$password' WHERE NOT EXISTS(SELECT * FROM users WHERE nameUser = 'novak')";
     */     

    /*     $sql_agregar = "INSERT INTO users(nameUser,passwordUser) VALUES ('$user', '$password')";
    */    
    
    /**Agregar nuevo usuario**/
  /*   $sql_agregar = " INSERT INTO users(nameUser,passwordUser) SELECT '$user', '$password' WHERE NOT EXISTS(SELECT * FROM users WHERE nameUser = 'novak')";

     if (mysqli_query($conn, $sql_agregar)) {
        header('location:index.php');
     } else {
        echo "Error: " . $sql_agregar . "" . mysqli_error($conn);
     }   */

     /**Validar password**/

     try{
        $validate = "SELECT * FROM users WHERE nameUser = '$user'";
        $resultado = $conn->query($validate);

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
        
        $sql_agregar = " INSERT INTO users(nameUser,passwordUser) SELECT '$user', '$password' WHERE NOT EXISTS(SELECT * FROM users WHERE nameUser = '$user')";

        if (mysqli_query($conn, $sql_agregar)) {
        echo 'agregado';

     header('location:index.php');
        } else {
           echo "Error: " . $sql_agregar . "" . mysqli_error($conn);
        }  

          foreach($details_users as $detail_user){
            echo 'Sesion is: ';
            echo $user;
            echo '   ';
            echo $password;
            echo '<br>';
            echo 'and database says: ';
            echo $detail_user['nameUSer'];
            echo '   ';
            echo $detail_user['passwordUser'];
            if($password == $detail_user['passwordUser'])
            {        
                header('location:index.php');
            }else
            {
                header('location:sesiones2.php');
            }
         };  

    }catch(\Exception $e){
        echo $e->getMessage();
    };
    
   

?>