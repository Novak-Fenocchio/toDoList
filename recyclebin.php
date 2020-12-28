<?php 
    session_start();

    $usuario =  $_SESSION['user'];
    include_once 'conection.php';
    
    try{
        $sql_recycle_bin = "SELECT * FROM tasks WHERE user = '$usuario' and stateTask = 'complete'";
        $resultado = $conn->query($sql_recycle_bin);
    }catch(\Exception $e){
        echo $e->getMessage();
    };

    $list_tasks_bin = array();
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
        $list_tasks_bin[$datesa][] = $task;
    }
    /* foreach($list_tasks_bin as $dia => $tasks_bin)
    {
        echo $dia;
        foreach($tasks_bin as $task_bin)
        {
            echo $task_bin['task'];
        }
    }
 */
?>
<html>
    <?php include_once 'includes/templates/head.php' ?>
    <body>
        <?php include_once 'includes/templates/header_recycle_bin.php' ?>
        
    <main class='container_main'>
        <?php include_once 'includes/templates/aside.php'; ?>
        <section class='section_tasks'>

        <h3 style='text-align: center;'>Bienvenido <?php echo $usuario ?></h3>
    <?php if (empty($list_tasks_bin)) {?> 
        <div class="empty_container">
            <div class="box_empty">
                <i class="fas fa-code i2"></i> 
                <h5><?php echo 'No hay notas aún, puedes agregarlas con el botón de la izquierda.';?></h5>
            </div>
        </div>
    <?php }?>
    <?php foreach($list_tasks_bin as $dia => $tasks_bin): ?>
    <h2 class='date_task_general'><?php echo date($dia); ?></h2> 
    <div class="border_orange"></div>
            <?php foreach($tasks_bin as $task_bin): ?>
                 
            <div class="container_task">
                <div class="container_task3">
                    <div class="container_task4">
                        <h2 class='task_<?php echo $task_bin['status']; ?>'><?php echo $task_bin['titleTask'];?></h2>
                            <div class="input-group" style="width: 40%;">
                                <div class="input-group-prepend">
                                    <div class="container_check">
                                    <a href="editar.php?id=<?php echo $task_bin["id"]?>"><i class="fas fa-check check"></i></a>
                                    </div>
                                </div>
                            <span id="task<?php echo $task_bin['id'];?>"  class='<?php echo $task_bin['stateTask']; ?> task'><?php echo $task_bin['task'];?></span>  
                        </div> 
                    </div>
                
                </div>
                <div class="container_status_task">
                    <span class='<?php echo $task_bin['status']; ?> status'><?php echo $task_bin['status']; ?></i></span>    
                    <span class='dateTask'><i class="far fa-calendar-alt"></i> <?php echo $task_bin['date']; ?></span>
                </div>
            </div>
            <hr>
        <?php endforeach ?>    
    <?php endforeach ?>

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
</section>

    </main>
    <?php include_once 'scripts.php' ?>
    </body>
</html>