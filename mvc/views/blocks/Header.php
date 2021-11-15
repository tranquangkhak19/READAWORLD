<style>
  /* Style The Dropdown Button */
  .dropbtn {
    cursor: pointer;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    border: 1px solid black;
    border-radius: 5px;
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    border-radius: 5px;
    background-color: #5bc0de;
  }

  .dropdown-content a:nth-child(2):hover {
    border-radius: 5px;
    background-color: #f0ad4e;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color: #3e8e41;
  }
</style>


<header class="p-3 bg-dark text-white"">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">

              <?php
                if(isset($_SESSION['id']) && isset($_SESSION['username']))
                {
                    $id = $_SESSION['id'];
                    $username = $_SESSION['username'];
                    echo 
                      '
                        <a href="Cart" class="btn btn-outline-light me-2">Cart</a>
                        <div class="dropdown">
                          <button class="dropbtn btn btn-outline-light">'.$username.'</button>
                          <div class="dropdown-content text-center">
                            <a href="Customer?id='.$id.'">My Account</a>
                            <a href="Logout">Logout</a>
                          </div>
                        </div>
                      ';
                }
                else
                {
                  echo
                    '
                      <a href="Login" class="btn btn-outline-light me-2">Login</a>
                      <a href="SignUp" class="btn btn-warning">Sign up</a>
                    ';
                }
              ?>
                
            </div>
        </div>
    </div>
</header>
