<!-- Copyright Snappi -->
<?php

    $todo_trash_id = $_GET['id'];
    include '../connection.php';

    if($todo_trash_id == ''){
        header('location: ../../todo.php');
    }
    else{
        $check_todo_id = "SELECT * FROM `todos` WHERE todo_id='$todo_trash_id'";
        $check_todo_id_execute = mysqli_query($con, $check_todo_id);
        if($_GET['status']=="Pending"){
            $new_status = "Completed";

        }
        else{
            $new_status = "Pending";
        }

        $check_todo_id_count = mysqli_num_rows($check_todo_id_execute);
        if($check_todo_id_count > 0){
            $todo_trash_query ="UPDATE `todos` SET `todo_status`='$new_status' WHERE `todo_id`='$todo_trash_id'";
            $todo_trash_execute = mysqli_query($con, $todo_trash_query);
            if($todo_trash_execute){
                ?>
                    <script>alert('Task marked '+<?php echo "'".$new_status."'"; ?>); location.href='../../todo.php';</script>
                <?php
            }
            else{
                ?>
                    <script>alert('something went wrong.'); location.href='../../todo.php';</script>
                <?php
            }
        }
        else{
            ?>
                <script>alert('Task non-existent.'); location.href='../../todo.php';</script>
            <?php
        }
    }

?>