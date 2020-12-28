<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en-US">
    <?php include_once 'includes/templates/head.php' ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <title>hideShowPassword for jQuery</title>
        <!-- modernizr (optional) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <link rel="stylesheet" href="css/sesiones.css">
    </head>
    <body >
        <?php
        // Set session variables
        $_SESSION["favcolor"] = "blue";
        $_SESSION["favanimal"] = "cat";
        $user1 = $_SESSION['user'];
        $pass1 = $_SESSION['password'];

    
        if($_POST)
        {   
            $_SESSION['user'] = $_POST['user'];
            $user = $_SESSION['user'];
            $_SESSION['password'] = $_POST['password'];
            $password = $_SESSION['password'];

            echo $user;
            echo $password;
            header('location:register.php');
        };
        ?>
        <section class='container formulario'>
        <h2>Iniciar sesion</h2>
            <figure >
                <div class="">
                    <form method="POST">
                        <input class="" name="user" id="username-3" type="text" placeholder="Usuario"> <br>
                        <label for="password">Contraseña incorrecta</label>
                        <input class="" name="password" id="password-3" type="password" placeholder="Contraseña" >
                        <input type="submit" class="submit" value='iniciar sesion' id="">
                    </form>
                </div>
            </figure>
            <div class="form-check">

        </section>
      

        <!-- including the jQuery dependency -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- including the plugin -->
        <script src="hideShowPassword.min.js"></script>
        <script>
            // Example 1:
            // - Password hidden by default
            // - Inner toggle shown
            $('#password-1').hidePassword(true);

            // Example 2:
            // - Password shown by default
            // - Toggle shown on 'focus' of element
            // - Custom toggle class
            $('#password-2').showPassword('focus', {
                toggle: {
                    className: 'my-toggle'
                }
            });

            // Example 3:
            // - When checkbox changes, toggle password
            //   visibility based on its 'checked' property
            $('#show-password').change(function() {
                $('#password-3').hideShowPassword($(this).prop('checked'));
            });
        </script>
        
    </body>

</html>



   


   