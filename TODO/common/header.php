<!-- Copyright Snappi -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="todo.php">ToDo Manager</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="todo.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trashData.php">Deleted Tasks</a>
                </li>
            </ul>
            <div>
                <a href="backend/auth/logout.php" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout.')">Logout</a>
            </div>
        </div>
    </div>
</nav>