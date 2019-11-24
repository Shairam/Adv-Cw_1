<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by ShaI  -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- Assets/CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" crossorigin="anonymous">"
	<style>
	 body {
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }
	</style>

</head>

	<!-- Sign In Section -->
<div class="container" id="con-signIn">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-center ">
					<img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
				</div>
				<h3>Sign In</h3>
			</div>
			<div class="card-body card-signIn">
				<form action="<?php echo site_url() ?>/authentication_controller/signInUser" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div>

					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#" id="signUpLink">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Sign Up Section -->
<div class="container" id="con-signUp" style="display:none;">
	<div class="d-flex justify-content-center h-100">

		<div class="card">
			<div class="card-header">

				<div class="d-flex justify-content-center ">
					<img src="<?php echo base_url("assets/images/home-logo.png") ?>" style="margin:inherit" width="200px" height="200px">
				</div>
				<h3>Sign Up</h3>
			</div>
			<div class="card-body card-signUp">
				<form action="<?php echo site_url() ?>/authentication_controller/registerUser" method="post" id="signUpForm">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Username" name="username" required>

					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="fname" placeholder="First Name" required>

					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="lname" placeholder="Last Name" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="date" name="dob" placeholder="Date of Birth" required>
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="imgURL" placeholder="Profile Image URL">

					</div>
					<!-- Input radio cheeck for getting the favourite music genres -->
					<div class="input-group form-group">
						<div class="multiselect">
							<div class="selectBox" onclick="showCheckboxes()">
								<select required>
									<option>Select Genres</option>
								</select>
								<div class="overSelect"></div>
							</div>
							<div id="checkboxes" class="genre-content">
								<?php
								foreach ($genreList as $row) {
									echo "<label>
									<input type=\"checkbox\"  name=\"genres[]\" value=" . $row["genre_id"] . " >" . $row["name"] . "</label>";
								}
								?>

							</div>
						</div>

					</div>

					<div class="form-group">
						<input type="submit" value="Sign Up" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links bottom-link">
					Already have an account?<a href="#" id="signInLink">Login</a>
				</div>
				<div class="d-flex justify-content-center">
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- load Jquery and custom JS file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>

</html>