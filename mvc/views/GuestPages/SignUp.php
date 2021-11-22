<div class="container mx-auto mt-5 p-3 bg-light border border-dark rounded" style="width: 60%;"">
    <h1 class="text-center">SIGN UP</h1>

    <br>
    <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
    ?>
    <br>

    <!-- Login form starts here -->
    <form method="POST" action="Authenticate">
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
            <input type="text"  name="firstname" class="form-control" placeholder="Enter your first name">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
            <input type="text"  name="lastname" class="form-control" placeholder="Enter your last name">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email"  name="email" class="form-control" placeholder="Enter your email">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Phone number</label>
            <div class="col-sm-10">
            <input type="text"  name="phone" class="form-control" placeholder="Enter your phone number">
            </div>
        </div>
        
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input type="text"  name="username" class="form-control" placeholder="Enter your username">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" name="password" class="form-control" placeholder="Enter your password">
            </div>
        </div>
        <div class="text-center my-4">
            <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
        </div>
    </form>

    <!-- Login form ends here -->
</div>