<div class="container mx-auto mt-5 p-3 bg-light border border-dark rounded" style="width: 500px;"">
    <h1 class="text-center">LOGIN</h1>

    <br>
    <?php
        if(isset($_SESSION['admin_login']))
        {
            echo $_SESSION['admin_login'];
            unset($_SESSION['admin_login']);
        }
    ?>
    <br>

    <!-- Login form starts here -->
    <form method="POST" action="Authenticate">
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input type="text"  name="username" class="form-control" placeholder="Input your username">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" name="password" class="form-control" placeholder="Input your password">
            </div>
        </div>
        <div class="text-center my-4">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
    <!-- Login form ends here -->
</div>
