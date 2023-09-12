<!-- Copyright Snappi -->
<?php
    session_start();
    include 'backend/connection.php';
    if($_SESSION['user_login'] != ''){
        $login_user_email = $_SESSION['user_login'];
        $fetch_user_query = "SELECT * FROM users WHERE user_email='$login_user_email' ";
        $user_execute = mysqli_query($con, $fetch_user_query);
        $user_count = mysqli_num_rows($user_execute);
        $login_user_id = 0;
        if($user_count == 1){
            $row = mysqli_fetch_array($user_execute);
            $login_user_id =  $row['user_id'];
        }

?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Todo Application</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />

    </head>

    <body>

        <?php include('common/header.php') ?>

        <main class="container my-5">
            <div class="card">
                <div class="card-header p-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Task List</h6>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#newTodo">New Todo</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Td</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $fetch_login_user_todo_query = "SELECT * FROM `todos` WHERE user_id='$login_user_id' AND todo_trash=0";
                                    $fetch_login_user_todo_execute = mysqli_query($con, $fetch_login_user_todo_query);
                                    $fetch_login_user_todo_count = mysqli_num_rows($fetch_login_user_todo_execute);
                                    if($fetch_login_user_todo_count >= 0){
                                        $i = 1;
                                        while($row = mysqli_fetch_assoc($fetch_login_user_todo_execute)){
                                            ?>
                                                <tr <?php echo(($row['todo_status']=="Completed")? "style='background-color:lightgrey; color:grey'":''); ?>>

                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['todo_name'] ?></td>
                                                    <td><?php echo $row['todo_date'] ?></td>
                                                    <td><?php echo $row['todo_desc'] ?></td>
                                                    <td><?php echo $row['todo_status'] ?></td>
                                                    <td>
                                                        <a href="backend/todo/updateStatus.php?id=<?php echo $row['todo_id']; ?>&status=<?php echo $row['todo_status']; ?>" class="btn btn-outline-success">
                                                            <?php echo(($row['todo_status']=="Pending")? "Mark Complete":"Revert Complete"); ?>
                                                        </a>
                                                        <a href="editTodo.php?id=<?php echo $row['todo_id']; ?>" class="btn btn-outline-primary">Edit</a>
                                                        <a href="backend/todo/trash.php?id=<?php echo $row['todo_id']; ?>" class="btn btn-outline-danger">Trash</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            $i+=1;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>

        <?php
        include('common/footer.php');
        include('common/model/newTodoModel.php');
        ?>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('table').DataTable();
            })
        </script>

    </body>

    </html>
<?php

    }
    else{
        header('location: index.php');
    }

?>