<?php require('components/head.inc.php'); ?>
<?php include('components/accounts/register.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/styles_login.css">
	<link rel="stylesheet" href="css/styles.css" />

	<title>Register Form - Pure Coding</title>
</head>
<body>

<div id="register-page">
	<div class="cont">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onChange="onChange()" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" onChange="onChange()" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>

			
		</form>
		<div id="message" class="hidden visuallyhidden">
			  <hr>
			  <h4 id="pass_warning">Password must contain the following:</h4>
			  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			  <p id="number" class="invalid">A <b>number</b></p>
			  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>
	</div>
</div>

<script src="js/register-script.js"></script>


</body>
</html>


<?php require('components/footer.inc.php'); ?>