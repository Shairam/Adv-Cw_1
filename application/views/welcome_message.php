<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<style>
		/* Made with love by Mutiullah Samim*/

		@import url('https://fonts.googleapis.com/css?family=Numans');

		html,
		body {
			background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			height: 100%;
			font-family: 'Numans', sans-serif;
		}

		.container {
			height: 100%;
			align-content: center;
		}

		.card {
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0, 0, 0, 0.5) !important;
		}

		.card-SignIn {
			max-height: 350px;
		}

		.card-SignUp {
			max-height: 700px;
		}

		.social_icon span {
			font-size: 60px;
			margin-left: 10px;
			color: #FFC312;
		}

		.social_icon span:hover {
			color: white;
			cursor: pointer;
		}

		.card-header h3 {
			color: white;
		}

		.social_icon {
			position: absolute;
			right: 20px;
			top: -45px;
		}

		.input-group-prepend span {
			width: 50px;
			background-color: #FFC312;
			color: black;
			border: 0 !important;
		}

		input:focus {
			outline: 0 0 0 0 !important;
			box-shadow: 0 0 0 0 !important;

		}

		.remember {
			color: white;
		}

		.remember input {
			width: 20px;
			height: 20px;
			margin-left: 15px;
			margin-right: 5px;
		}

		.login_btn {
			color: black;
			background-color: #FFC312;
			width: 100px;
		}

		.login_btn:hover {
			color: black;
			background-color: white;
		}

		.links {
			color: white;
		}

		a {
			margin-left: 4px;
			color: #74db90;
		}

		.multiselect {
			width: 200px;
		}

		.selectBox {
			position: relative;
		}

		.selectBox select {
			width: 100%;
			font-weight: bold;
		}

		.overSelect {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
		}

		#checkboxes {
			display: none;
			border: 1px #dadada solid;
		}

		#checkboxes label {
			display: block;
		}

		#checkboxes label:hover {
			background-color: #1e90ff;
		}

		.genre-content {

			background: rgba(0, 0, 0, 0.3);
			color: #fff;
			text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
		}
	</style>
</head>
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
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>

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
				<form action="<?php echo site_url() ?>/authentication_controller/registerUser" method="post">
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
						<input type="password" class="form-control" name="passsword" placeholder="Password" name="password" required>
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
						<input type="text" class="form-control" name="imgURL" placeholder="Image URL">

					</div>
					<!-- Input radio cheeck for getting the favourite music genres -->
					<div class="input-group form-group">
						<div class="multiselect">
							<div class="selectBox" onclick="showCheckboxes()">
								<select>
									<option>Select Genres</option>
								</select>
								<div class="overSelect"></div>
							</div>
							<div id="checkboxes" class="genre-content">
								<?php
								foreach ($genreList as $row) {
									echo "<label>
									<input type=\"checkbox\"  name=\"genres[]\" value=" . $row["genre_id"] . ">" . $row["name"] . "</label>";
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
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>

</html>