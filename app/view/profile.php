<div class="container mt-5">
    <h3>Edit user</h3>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="string" class="form-control" id="username" name="username"
                placeholder="<?php echo $_SESSION['username'] ?? 'you are not supposed to be here. go to the home page' ?>" />
        </div>
        <div class="mb-3">
            <label for="old" class="form-label">Current password</label>
            <input type="password" class="form-control" id="old" name="old" placeholder="Current password" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="New password" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/profile?logout=true" class="btn btn-danger">Logout</a>
        <input type="submit" class="btn btn-danger" name="delete" value="DELETE YOUR ACCOUNT" />
    </form>
</div>
