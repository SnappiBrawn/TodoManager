<!-- Copyright Snappi -->
<?php

    session_start();
    if(isset($_SESSION['user_login']))
    {
        header('location: todo.php');
    }
    else{

?>

<!doctype html>
<html lang="en">

<head>
    <title>Login User</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body class="vh-100">

    <div class="container h-100">

        <div class="d-flex justify-content-center align-items-center h-100">
            <form action="backend/auth/login.php" method="post" class="w-50">
                <div class="text-center py-3">
                    <h3>Login</h3>
                </div>
                <div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="user_email" id="user_email" aria-describedby="helpId" placeholder="your email address">
                    </div>
                    <div class="mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="user_password" id="user_password" aria-describedby="helpId" placeholder="your password">
                    </div>
                </div>
                <div>
                    <button type="submit" name="login" class="btn btn-outline-primary w-100">Submit</button>
                </div>

                <div class="text-center p-3">
                    <a href="register.php" class="text-decoration-none">Create a new account</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

</body>

</html>

<?php
    }
?>