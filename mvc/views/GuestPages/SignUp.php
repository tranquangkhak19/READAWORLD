<div class="container mx-auto mt-5 p-3 bg-light border border-dark rounded" style="width: 60%;"">
    <h1 class="text-center">SIGN UP</h1>

    <h6 class="text-danger my-4">
        <?php
            if(isset($_SESSION['signup']))
            {
                echo $_SESSION['signup'];
                unset($_SESSION['signup']);
            }
        ?>
    </h6>

    <!-- Login form starts here -->
    <form method="POST" action="#" id="form_signup">
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Username (*)</label>
            <div class="col-sm-10">
            <input type="text"  id="username_signup" class="form-control" placeholder="Enter your username" required>
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Password (*)</label>
            <div class="col-sm-10">
            <input type="text" id="password_signup" class="form-control" placeholder="Enter your password" required>
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Email (*)</label>
            <div class="col-sm-10">
            <input type="email"  id="email_signup" class="form-control" placeholder="Enter your email" required>
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">First name</label>
            <div class="col-sm-10">
            <input type="text"  id="firstname_signup" class="form-control" placeholder="Enter your first name">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Last name</label>
            <div class="col-sm-10">
            <input type="text"  id="lastname_signup" class="form-control" placeholder="Enter your last name">
            </div>
        </div>
        <div class="form-group row my-3">
            <label class="col-sm-2 col-form-label">Phone number</label>
            <div class="col-sm-10">
            <input type="text"  id="phone_signup" class="form-control" placeholder="Enter your phone number">
            </div>
        </div>
        <div class="text-center my-4">
            <input type="submit" name="submit" id="btn_signup" class="btn btn-primary">
        </div>
    </form>

    <!-- Login form ends here -->
</div>


<script type="text/javascript">
    function validateEmail(email) 
    {
        var regex = /\S+@\S+\.\S+/;
        return regex.test(email);
    }

	$(document).ready(function(){
		$("#btn_signup").click(function(){
            var username_signup = $("#username_signup").val();
            var password_signup = $("#password_signup").val();
            var email_signup = $("#email_signup").val();
            var firstname_signup = $("#firstname_signup").val();
            var lastname_signup = $("#lastname_signup").val();
            var phone_signup = $("#phone_signup").val();

            //console.log(username_signup, password_signup, email_signup, firstname_signup, lastname_signup, phone_signup);

            if(validateEmail(email_signup) && username_signup && password_signup)
            {
                console.log("SENT INPUT!");
                $.ajax({
                    url:"AddCustomerToDB",
                    method:"POST",
                    data:{username_signup:username_signup, password_signup:password_signup, email_signup:email_signup,
                        firstname_signup:firstname_signup, lastname_signup:lastname_signup, phone_signup:phone_signup}
                    // success:function(){
                        
                    //     // if(session_signup )
                    //     // {
                    //     //     console.log(session_signup);
                    //     //     alert("SIGN UP SUCCESSFULLY!");
                    //     //     window.location.href = "Login";
                    //     // }
                    //     // else
                    //     {
                    //         console.log("---", session_signup, "---");
                    //         alert("FAILED TO SIGN UP!");
                    //     }
                    // }
                });
            }
            else
            {
                alert("FAILED TO SIGN UP!");
                <?php $_SESSION['signup'] = "FAILED TO SIGN UP. PLEASE, CHECK YOUR EMAIL AGAIN!"; ?>
            }
		});
	});
</script>