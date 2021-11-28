
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<header class="p-3 bg-dark text-white"">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="Show" class="nav-link px-2 text-primary"><h2><span style="color:white">READ</span>AWORLD</h2></a>
            

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="Show" class="nav-link px-2 text-light"><h6>Books</h6></a></li>
                <li><a href="AboutUs" class="nav-link px-2 text-light"><h6>About</h6></a></li>
                <li><a href="ContactUs" class="nav-link px-2 text-light"><h6>Contact</h6></a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" name="search_name" id="search_name" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">

              <?php
                if(isset($_SESSION['id']) && isset($_SESSION['username']))
                {
                    $id = $_SESSION['id'];
                    $username = $_SESSION['username'];
                    $numbooks = $_SESSION['numbooks'];
                    echo 
                      '
                        <a href="Cart" class="btn btn-outline-light me-2">
                          <i class="fas fa-shopping-cart"></i> 
                          
                        </a>
                        <div class="dropdown">
                          <button class="dropbtn btn btn-outline-light"><i class="fas fa-user"></i> '.$username.'</button>
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
                      <a href="SignUp" class="btn btn-warning"><i class="fas fa-user-plus"></i> Sign up</a>
                    ';
                }
              ?>
                
            </div>
        </div>
    </div>
</header>


<script type="text/javascript">
	$(document).ready(function(){
		var action = "Search";
		$("#search_name").keyup(function(){
			var search_name = $("#search_name").val();
			if ($("#search_name").val() != '') 
      {
        $.ajax({
          url:"Search",
          method:"POST",
          data:{action:action,search_name:search_name},
          success:function(data){
            $("#list-books").html(data);
          }
        });
			}
			else
      {

			}

		});
	});
</script>
