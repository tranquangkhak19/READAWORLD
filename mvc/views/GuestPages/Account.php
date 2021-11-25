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
									<h4>
                                        <?php
                                            if($fname!="" && $lname!="")
                                            {
                                                echo $fname." ".$lname;
                                            }
                                            else
                                            {
                                                echo $username;
                                            }
                                        ?>
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
                                        My Accout
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
									<input type="text" class="form-control" value="<?php echo $fname; ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Last Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $lname; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $email; ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $phone; ?>">
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
									<input type="button" class="btn btn-primary px-4" value="Save changes">
								</div>
							</div>
						</div>
					</div>
                    <div class="card mt-4">
						<div class="card-body">
                            <h5 class="card-title text-center mb-4">ACCOUNT</h5>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $username; ?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Current Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="" placeholder="Type your current password">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">New Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="" placeholder="Type your new password">
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-primary px-4" value="Save changes">
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>