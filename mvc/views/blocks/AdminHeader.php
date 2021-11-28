<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>


<header class="p-3 bg-dark text-white"">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="Show" class="nav-link px-2 text-primary"><h2><span style="color:white">READ</span>AWORLD</h2></a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="Show" class="nav-link px-2 text-light"><h6>Dashboard</h6></a></li>
              <li><a href="Customer" class="nav-link px-2 text-light"><h6>Customer</h6></a></li>
              <li><a href="Book" class="nav-link px-2 text-light"><h6>Book</h6></a></li>
              <li><a href="Publisher" class="nav-link px-2 text-light"><h6>Publisher</h6></a></li>
            </ul>
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" name="search_name" id="search_name" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form> -->

            <div class="text-end">

              <?php
                if(isset($_SESSION['admin_id']) && isset($_SESSION['admin_username']))
                {
                    $admin_id = $_SESSION['admin_id'];
                    $admin_username = $_SESSION['admin_username'];
                    echo 
                      '
                        <div class="dropdown">
                          <button class="dropbtn btn btn-outline-light"><i class="fas fa-user"></i> '.$admin_username.'</button>
                          <div class="dropdown-content text-center">
                            <a href="Account">My Account</a>
                            <a href="Logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                          </div>
                        </div>
                      ';
                }
                else
                {
                  echo
                    '
                      <a href="Login" class="btn btn-outline-light me-2"><i class="fas fa-sign-in-alt"></i> Login</a>
                    ';
                }
              ?>
                
            </div>
        </div>
    </div>
</header>
