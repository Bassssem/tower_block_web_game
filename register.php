<?php 

include 'config.php';

error_reporting(0);

session_start();



if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$link = $_POST['link'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	
	
	
	


	$img_name = $_FILES['img']['name'];
	$img_size = $_FILES['img']['size'];
	$tmp_name = $_FILES['img']['tmp_name'];
	$error = $_FILES['img']['error'];

	if ($error === 0) {
		if ($img_size > 2000000) {
			echo("Sorry, your photo is too large.");
		   
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				
	
	
	
	
    
   
 
   

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (img, username, link, email, password, score)
					VALUES ('$new_img_name', '$username', '$link', '$email', '$password', 0)";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
else {
				echo("You can't upload files of this type");
			}
		}
	}else {
		echo("unknown error occurred!");
	
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form name="f" action="" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Link of tit tok , instagram , yt , fb" name="link" value="<?php echo $link; ?>" required>
			</div>
			<div class="input-group">
				<input type="file" placeholder="img of tit tok , instagram , yt , fb" name="img" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" on click="return verif();" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index1.php">Login Here</a>.</p>
		</form>
	</div>
	<script>
function verif(){
					a=document.f.username.value;
					b=document.f.link.value;
					if(a.length>15){
					alert("username is to large");
					return false;
					}
					
					if(b.slice(0,4)!="http"){
					alert("wrong link");
					return false;
					}
					}
	</script>
</body>
</html>