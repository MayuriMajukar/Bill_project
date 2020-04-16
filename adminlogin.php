<?php include 'header.php';?>
<?php session_start();
	$value='';
	?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="adminauth.php" method="POST">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

                     <span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					<?php include 'errors.php'; ?>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="save">
								Login
						</button>
						&nbsp &nbsp &nbsp
						
					</div>
				
					</form>
			</div>
		</div>
	</div>
	
<?php include 'footer.php';?>
