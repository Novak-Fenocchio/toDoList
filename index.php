<?php
// Start the session
session_start();
?>

<?php
    include_once 'conection.php';
/*     $user = $_SESSION["user"];
 */    

    $usuario =  $_SESSION['user'];
    try{
        $sql = "SELECT * FROM tasks WHERE user = '$usuario'";
        $resultado = $conn->query($sql);
    
    }catch(\Exception $e){
        echo $e->getMessage();
    };


    //Declare the array with the List of Tasks
    $list_tasks = array();
    //Make a array with the tasks and I put them in the array of the lists 
    while($tasks = $resultado->fetch_assoc())
    {
        $datesa = $tasks['dateTask'];
        $task = array(
            'id' => $tasks['id'],
            'titleTask' => $tasks['nameTask'],
            'task' => $tasks['task'],
            'stateTask' => $tasks['stateTask'],
            'status' => $tasks['statusTask'],
            'date' => $tasks['dateTask']
        );
        $list_tasks[$datesa][] = $task;
    }
?>

<html>
    <?php
        include_once 'includes/templates/head.php';
    ?>
    <body class="">
    <?php
        include_once 'includes/templates/header.php';
    ?>

    <main class='container_main'>
    <h3 style='text-align: center;'>Bienvenido <?php echo $usuario ?></h3>
    
    <?php foreach($list_tasks as $dia => $list_task): ?>
    <h2 class='date_task_general'><?php echo date($dia); ?></h2> 
    <div class="border_orange"></div>
            <?php foreach($list_task as $task_detail): ?>
            <div class="container_task">
                <div class="container_task3">
                    <div class="container_task4">
                        <h2 class='task_<?php echo $task_detail['status']; ?>'><?php echo $task_detail['titleTask'];?></h2>
                            <div class="input-group" style="width: 40%;">
                                <div class="input-group-prepend">
                                    <div class="container_check">
                                    <a href="editar.php?id=<?php echo $task_detail["id"]?>"><i class="fas fa-check check"></i></a>
                                    </div>
                                </div>
                            <span id="task<?php echo $task_detail['id'];?>"  class='<?php echo $task_detail['stateTask']; ?> task'><?php echo $task_detail['task'];?></span>  
                        </div> 
                    </div>
                
                </div>
                <div class="container_status_task">
                    <span class='<?php echo $task_detail['status']; ?> status'><?php echo $task_detail['status']; ?></i></span>    
                    <span class='dateTask'><i class="far fa-calendar-alt"></i> <?php echo $task_detail['date']; ?></span>
                </div>
            </div>
            <hr>
        <?php endforeach ?>    
    <?php endforeach ?>
    <div class="button" id='btnAddTask'>
        <button class='btn_rojo' id='buttonAddTask'>Añadir tarea!</button>
    </div>

    <div class="container_add_task " id='addTasks' >
         <form method="POST" action='add.php' >
                <div class="container_add_task2">
                    <div class="add_name_task">
                            <h3>Nombre</h3>
                        <input type="text" placeholder="Name of task" class='box_text' name="nameTask">
                    </div>
                    <div class="add_content_task">
                        <h3>Tarea</h3>
                        <input type="text" placeholder="Task" name="task" class='box_text'> <br> <br>
                    </div>
                    <div class="buttons_add_task">
                        <div class="container_buttons_add">

                            <select name="status" id="" class='box_text'>
                                <option value="Importante">Importante</option>
                                <option value="Urgente">Urgente</option>
                                <option value="Libre">Libre</option>
                            </select>
                            <input type="date" name='date' class='calendar' value='Day'> <br>
                        </div>
                        <input type="submit" class='btn_rojo btn_add_task'  value="Añadir tarea" name="submit"> 

                    </div>
                </div>
           </form> 
        </div>

</div>

    </main>
        <?php include_once 'scripts.php' ?>
    </body>
</html>