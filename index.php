<?php
// Start the session
session_start();
?>

<?php
    include_once 'conection.php';
    $usuario =  $_SESSION['user'];
    try{
        $sql = "SELECT * FROM tasks WHERE user = '$usuario' and stateTask = 'incomplete' ";
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
    $vara = '';
    $size_array = 0;
?>
<html>
    <head>
                <link rel='icon' href='data:image/png;base64,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'>
    </head>
    <?php
        include_once 'includes/templates/head.php';
    ?>
    <body class="">
    <?php
        include_once 'includes/templates/header.php';
    ?>
    <main class='container_main'>
    <?php include_once 'includes/templates/aside.php'; ?>
    <section class='section_tasks'>

    <h3 class='presentacion' style='text-align: center;'>Bienvenido <?php echo $usuario ?></h3>
    <?php if (empty($list_tasks)) {?> 
        <div class="empty_container">
            <div class="box_empty">
                <i class="fas fa-code i2"></i> 
                <h5><?php echo 'No hay notas aún, puedes agregarlas con el botón de la izquierda.';?></h5>
            </div>
        </div>
    <?php }?>
    <section class='section_task'>

    <?php foreach($list_tasks as $dia => $list_task): ?>
    <h2 class='date_task_general'><?php echo date($dia); ?></h2> 
    <div class="border_orange"></div>
            <?php foreach($list_task as $task_detail): ?>
                 
            <div class="container_task">
                <div class="container_task3">
                    <div class="container_task4">
                        <h2 class='task_<?php echo $task_detail['status']; ?>'><?php echo $task_detail['titleTask'];?></h2>
                            <div class="input-group maldito" style="width: 100%;">
                                <div class="input-group-prepend">
                                    <div class="container_check">
                                    <a href="editar.php?id=<?php echo $task_detail["id"]?>"><i class="fas fa-check check iP"></i></a>
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
    </section>

  
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
                    <input type="hidden" value='incomplete' name="stateTask" id="">
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
       
      
</section>

    </main>
        <?php include_once 'scripts.php' ?>
    </body>
</html>