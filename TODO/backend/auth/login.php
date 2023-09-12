<!-- Copyright Snappi -->
<?php

    include('../connection.php');

    session_start();

    if(isset($_POST['login'])){

        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $hash_password = md5($password);

        $query = "SELECT * FROM users WHERE user_email='$email' AND user_password='$hash_password'";
        $check_user_login = mysqli_query($con, $query);
        if($check_user_login){
            $_SESSION["user_login"] = $email;
            header('location: ../../todo.php');
        }
        else{
            ?>
                <script>alert('Please, check your email and password.')</script>
            <?php
            header('location: ../../index.php');
        }
    }

?>