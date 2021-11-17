<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Admin</title>
</head>
<body class="m-0">
    <?php require_once "./mvc/views/blocks/Header.php";?>
        <div class="container mx-auto mt-5 p-3 bg-light border border-dark rounded" style="width: 500px;"">
            <h1 class="text-center">Login</h1>

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
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                    <input type="text"  name="username" class="form-control" placeholder="Input your username">
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" placeholder="Input your password">
                    </div>
                </div>
                <div class="text-center my-4">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary">
                </div>
            </form>

            <!-- Login form ends here -->
    </div>

    <?php require_once "./mvc/views/blocks/Footer.php";?>
</body>
</html>


<?PHP
    // //Check wheter the submit button is clicked or not
    // if(isset($_POST['submit']))
    // {
    //     //Process for Login

    //     //1. Get data from Login form
    //     $username = $_POST['username'];
    //     $password = md5($_POST['password']);

    //     //2. SQL to check if the username already exists or not
    //     $sql_checkUser = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    //     $res_checkUser = mysqli_query($conn, $sql_checkUser);
    //     $checkUser = mysqli_num_rows($res_checkUser);
    //     if($checkUser==1)
    //     {
    //         $_SESSION['login'] = "<div class='success'>Login Successfully!</div>";
    //         $_SESSION['user'] = $username;
    //         header('location:'.SITEURL.'admin/');
    //     }
    //     else
    //     {
    //         $_SESSION['login'] = "<div class='error text-center'>Username or password is not match!</div>";
    //         header('location:'.SITEURL.'admin/login.php');
    //     }
    //}
?>