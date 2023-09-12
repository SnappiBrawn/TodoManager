<!-- Copyright Snappi -->
<div class="modal fade" id="newTodo" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">New Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="backend/todo/create.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="todo_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="todo_name" id="todo_name" aria-describedby="helpId" placeholder="Enter Todo Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="todo_description" class="form-label">Description</label>
                        <textarea class="form-control" name="todo_description" id="todo_description" placeholder="Todo Description" rows="6" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btn_new_todo" class="btn btn-outline-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>