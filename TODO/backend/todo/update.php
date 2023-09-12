<!-- Copyright Snappi -->
<?php

    if(isset($_POST['btn_new_todo']))
    {
        $todo_trash_id = $_POST['todo_id'];
        include '../connection.php';

        if($todo_trash_id == ''){

            header('location: ../../todo.php');
        }
        else{
            $todo_name = $_POST['todo_name'];
            $todo_description = $_POST['todo_description'];

            $check_todo_id = "SELECT * FROM `todos` WHERE todo_id='$todo_trash_id' AND todo_trash='0'";
            $check_todo_id_execute = mysqli_query($con, $check_todo_id);
            $check_todo_id_count = mysqli_num_rows($check_todo_id_execute);
            if($check_todo_id_count > 0){
                $todo_trash_query ="UPDATE `todos` SET `todo_name`='$todo_name',`todo_desc`='$todo_description' WHERE `todo_id`='$todo_trash_id'";
                $todo_trash_execute = mysqli_query($con, $todo_trash_query);
                if($todo_trash_execute){
                    ?>
                        <script>alert('This todo update successfully.'); location.href='../../todo.php';</script>
                    <?php
                }
                else{
                    ?>
                        <script>alert('sorry, this todo is not updated.'); location.href='../../todo.php';</script>
                    <?php
                }
            }
            else{
                ?>
                    <script>alert('sorry, this todo is not found.'); location.href='../../todo.php';</script>
                <?php
            }
        }
    }

?>