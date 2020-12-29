<aside id='aside'>

    <?php foreach($list_tasks as $dia => $list_task){
        foreach($list_task as $task_detail){
            $size_array++;
        };          
    };  
         ?>  
        <div class="button" id='btnAddTask'>
            <button class='btn_rojo btn_add_task_aside' id='buttonAddTask'>Añadir tarea!</button>
        </div> 
        <a href="index.php" target='_AUTOBLANK' class='link'><h2 class='titulo_aside'><i class="far fa-edit i4"></i></i></i> Inicio</h2></a> 
        <a href="recyclebin.php" target='_AUTOBLANK' class='link'><h2 class='titulo_aside'><i class="fas fa-recycle i1"></i> Papelera</h2></a> 
        <span class='titulo_aside span_aside'><i class="fas fa-sort-numeric-down i5"></i> Cant. notas: <?php echo $size_array; ?> </span> 

        <div class="container_add_taskMobile " id='addTasks2' >
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
</div>
      
        <div class="button">
         <a href='sesiones.php'><button class='btn_rojo btn_add_task_aside cerrar_sesion'  id='buttonAddTask'>Cerrar sesión</button></a>   
        </div>
    </aside>