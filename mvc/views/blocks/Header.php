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

  li .nav-link:hover{
    background-color: #0275d8;
    border-radius: 5px;
  }

</style>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>


<header class="p-3 bg-dark text-white"">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="Show" class="nav-link px-2 text-primary"><h2><span style="color:white">READ</span>AWORLD</h2></a>
            

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="Show" class="nav-link px-2 text-light"><h6>Books</h6></a></li>
                <li><a href="Show" class="nav-link px-2 text-light"><h6>About</h6></a></li>
                <li><a href="Show" class="nav-link px-2 text-light"><h6>Contact</h6></a></li>
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
                    echo 
                      '
                        <a href="Cart" class="btn btn-outline-light me-2"><i class="fas fa-shopping-cart"></i></a>
                        <div class="dropdown">
                          <button class="dropbtn btn btn-outline-light"><i class="fas fa-user"></i> '.$username.'</button>
                          <div class="dropdown-content text-center">
                            <a href="Customer?id='.$id.'">My Account</a>
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

<ul class="list-group" id="output_search">
</ul>

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
