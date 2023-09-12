<!-- Copyright Snappi -->
<?php

    include '../connection.php';
    if(isset($_POST['btn_new_todo']))
    {
        session_start();

        $name = $_POST['todo_name'];
        $description = $_POST['todo_description'];
        $today_date = date('Y-m-d');
        $login_user_email = $_SESSION['user_login'];

        if($name == '' && $description == ''){
            ?>
                <script>alert('Please, enter the values into the filed.'); location.href='../../todo.php';</script>
            <?php
        }
        else{
            $fetch_user_query = "SELECT * FROM users WHERE user_email='$login_user_email' ";
            $user_execute = mysqli_query($con, $fetch_user_query);
            $user_count = mysqli_num_rows($user_execute);
            if($user_count == 1){
                $row = mysqli_fetch_array($user_execute);
                $login_user_id =  $row['user_id'];

                // Create a new todo
                $new_todo_query = "INSERT INTO `todos`(`todo_name`, `todo_desc`, `todo_date`, `user_id`) VALUES ('$name','$description','$today_date', '$login_user_id') ";
                $new_todo_query_execute = mysqli_query($con, $new_todo_query);
                if($new_todo_query_execute){
                    ?>
                        <script>alert('New Todo save successfully.'); location.href='../../todo.php';</script>
                    <?php
                }
                else{
                    ?>
                        <script>alert('Sorry, this todo is not saved.'); location.href='../../todo.php';</script>
                    <?php
                }
            }
        }
    }

?>