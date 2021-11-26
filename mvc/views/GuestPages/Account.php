<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    $customer = $data['customer'];

    $id = $customer['ID'];
    $username = $customer['USERNAME'];
    $password = $customer['PWD'];
    $phone = $customer['PHONE'];
    $email = $customer['EMAIL'];
    $fname = $customer['FNAME'];
    $lname = $customer['LNAME'];

?>

<div class="container">
		<div class="main-body">
			<div class="row my-5">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://i.pinimg.com/564x/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.jpg" alt="user image" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4 id="cus_name">
                                        <?php echo $username; ?>
                                    </h4>
                                    <p>Come here and get the world</p>
								</div>
							</div>
							<hr class="my-1">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-sm-2">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        My Account
                                    </div>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-sm-2">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        My Notifications
                                    </div>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-sm-2">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        Manage my orders
                                    </div>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-sm-2">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        My payment information
                                    </div>
								</li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="col-sm-2">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="col-sm-10 text-secondary">
                                        My Cart
                                    </div>
								</li>
                            </ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8">

					<div class="card">
						<div class="card-body">
                            <h5 class="card-title text-center mb-4">INFORMATION</h5>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">First Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="fname" class="form-control" value="<?php echo $fname; ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="lname" class="form-control" value="<?php echo $lname; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="email" class="form-control" value="<?php echo $email; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="phone" class="form-control" value="<?php echo $phone; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="In your heart <3">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" id="update_info" class="btn btn-primary px-4" value="Save changes">
								</div>
							</div>
						</div>
					</div>
                    <div class="card mt-4">
						<div class="card-body">
                            <h5 class="card-title text-center mb-4">ACCOUNT</h5>
							<p class="text-danger">Note: If you want to change account information, you must retype the current password correctly.</p>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<h6 id="username"><?php echo $username; ?></h6>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Current Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="cur_password" class="form-control" value="" placeholder="Type your current password" required>
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">New Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="new_password" class="form-control" value="" placeholder="Type your new password">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Retype New Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="new_password2" class="form-control" value="" placeholder="Retype your new password">
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" id="update_account" class="btn btn-primary px-4" value="Save changes">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	
<script type="text/javascript">
    $(document).ready(function(){
		var cur_fname = "<?php echo $fname; ?>";
		var cur_lname = "<?php echo $lname; ?>";
		var cur_email = "<?php echo $email; ?>";
		var cur_phone = "<?php echo $phone; ?>";

		var cur_password = "<?php echo $password; ?>";

		$("#update_info").click(function(){
			var new_fname = $("#fname").val();
			var new_lname = $("#lname").val();
			var new_email = $("#email").val();
			var new_phone = $("#phone").val();
			
			if(cur_fname==new_fname && cur_lname==new_lname && cur_email==new_email && cur_phone==new_phone)
			{
				alert("NO CUSTOMER INFORMATION HAS BEEN CHANGED!");
			}
			else
			{
				$.ajax({
					url: "UpdateCustomerInfo",
					type: "POST",
					data: {fname:new_fname, lname:new_lname, email:new_email, phone:new_phone},
					success:function(){
						alert("UPDATE CUSTOMER INFORMATION SUCCESSFULLLY!");
						cur_fname = new_fname;
						cur_lname = new_lname;
						cur_email = new_email;
						cur_phone = new_phone;
					}
				});
			}
		});

		$("#update_account").click(function(){
			var cur_password_retype = $("#cur_password").val();
			var cur_pasword_retype_encrypt =  CryptoJS.MD5(cur_password_retype)+"";
			var new_password = $("#new_password").val();
			var new_pasword_encrypt =  CryptoJS.MD5(new_password)+"";
			var new_password2 = $("#new_password2").val();

			//https://github.com/brix/crypto-js/issues/93
			if(!cur_password_retype || !new_password || !new_password2)
			{
				alert("FAILED. FILL IN ALL REQUIRED INPUT!");
			}
			else if(cur_pasword_retype_encrypt!=cur_password)
			{
				alert("FAILED. CURRENT PASSWORD IS INCORRECT!");
			}
			else if(new_password != new_password2)
			{
				alert("FAILED. NEW PASSWORD DOES NOT MATCH!");
			}
			else
			{
				if(new_pasword_encrypt==cur_password)
				{
					alert("YOUR PASSWORD HAS NOT CHANGED!");
				}
				else
				{
					$.ajax({
						url: "UpdateCustomerAccount",
						type: "POST",
						data: {password:new_pasword_encrypt},
						success:function(response){
							console.log(response);
							alert("UPDATED ACCOUNT INFORMATION SUCCESSFULLY!");
							cur_password = new_pasword_encrypt;
							$("#cur_password").val("");
							$("#new_password").val("");
							$("#new_password2").val("");
						}
					});
				}
			}
		});
		
    });
</script>
