<!-- Copyright Snappi -->
<?php

    $todo_trash_id = $_GET['id'];
    include 'backend/connection.php';

    if ($todo_trash_id == '') {
        header('location: ../../todo.php');
    }
    else {
        $check_todo_id = "SELECT * FROM `todos` WHERE todo_id='$todo_trash_id' AND todo_trash='0'";
        $check_todo_id_execute = mysqli_query($con, $check_todo_id);
        $check_todo_id_count = mysqli_num_rows($check_todo_id_execute);
        if ($check_todo_id_count > 0) {
            if($row = mysqli_fetch_assoc($check_todo_id_execute))
            {
                ?>
                    <!doctype html>
                    <html lang="en">

                    <head>
                        <title>Title</title>

                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />

                    </head>

                    <body class="vh-100">
                        <div class="container d-flex justify-content-center align-items-center h-100">
                            <div class="card w-100">
                                <div class="card-header p-3">
                                    <h6 class="m-0">Edit Todo</h6>
                                </div>
                                <form action="backend/todo/update.php" method="post">
                                    <div class="card-body">
                                        <input type="hidden" name="todo_id" value="<?php echo $row['todo_id']; ?>">
                                        <div class="mb-3">
                                            <label for="todo_name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="todo_name" id="todo_name" value="<?php echo $row['todo_name']; ?>" placeholder="Your Todo Name" require>
                                        </div>
                                        <div class="mb-3">
                                            <label for="todo_description" class="form-label">Description</label>
                                            <textarea name="todo_description" id="todo_description" class="form-control" rows="10"><?php echo $row['todo_desc']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="todo.php" type="button" class="btn btn-outline-warning">Close</a>
                                        <button type="submit" name="btn_new_todo" class="btn btn-outline-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </body>

                    </html>
                <?php
            }
        }
        else {
            header('location: todo.php');
        }
    }
?>