<!-- Copyright Snappi -->
<?php

    include '../connection.php';


    if (isset($_POST['btn_register'])) {
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $confirm_password = $_POST['user_confirm_password'];
        $today_date = date('Y-m-d H:i:s');;


        if ($name == '' && $email == '' && $password == '' && $confirm_password == '') {
            ?>
                <script>alert('Please Enter the values into the filed.');</script>
            <?php
        }
        else 
        {
            if ($confirm_password == $password) {
                $hash_password = md5($password);
                $new_user_query = "INSERT INTO users(user_name, user_email, user_password, create_date) VALUES('$name', '$email', '$hash_password', '$today_date')";
                $register_user = mysqli_query($con, $new_user_query);
                echo $register_user;
                if($register_user){
                    ?>
                        <script>alert('Register SuccessFully.');</script>
                    <?php
                    header("Location: ../../index.php");
                }
                else{
                    
                    ?>
                        <script>alert('Sorry! This user not register.');</script>
                    <?php
                }
            }
            else {
                ?>
                    <script>alert('password and confirm password are not match.');</script>
                <?php
            }
        }
    }

?>