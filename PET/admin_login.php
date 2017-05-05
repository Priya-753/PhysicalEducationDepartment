
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Login Form (admin)</title>
<link href="styling.css" rel="stylesheet" type="text/css">
<link href="style_login.css" rel="stylesheet" type="text/css">
<script src="registration-form-validation.js"></script>
<style>
.res{
	color: white;
}
</style>
<script src="login-form-validation.js"></script>
</head>
<body bgcolor="#FFFFFF">
	<nav id="mainNav">
		<ul>
			<div class="leftNav">
			<li><a href="index.html" title="HOME">Home</a></li>
			</div>
		<div class="rightNav">
			<li class="dropdown"><a href="javascript:void(0)" class="dp" id="act">Login</a>
				<div class="dropdown-content">
					<a href="admin_login.php">ADMIN</a>
					<a href="stud_login.php">STUDENT</a>
					<a href="teach_login.php">TEACHER</a>
				</div>
			</li>
		</div>
		</ul>
	</nav>
	<?php


		//DB configuration Constants
		define('_HOST_NAME_', 'localhost');
		define('_USER_NAME_', 'root');
		define('_DB_PASSWORD', 'briTney753');
		define('_DATABASE_NAME_', 'physicalEducationDepartment');

		//PDO Database Connection
		try {
			$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
			$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

		if(isset($_POST['submit'])){
			session_start();
			$errMsg = '';
			//username and password sent from Form
			$username = trim($_POST['userid']);
			$password = trim($_POST['passid']);

				$stmt = $databaseConnection->prepare("SELECT * FROM adminDetails WHERE adminID LIKE :userid");
				$stmt->bindValue(':userid', "{$username}");
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
					 if($userRow['password']==$password)
					 {
						 $_SESSION['userid'] = $username;
						 header('location: admin_module/admin_home.php');
				}
				else{
					$fmsg="Password or admin ID is incorrect!";
					echo "<span class='res'>" . $fmsg . "</span>";
				}
		 }
		 else{
			 $msg="Sorry! You are not an admin";
			 echo "<span class='res'>" . $msg . "</span>";
		 }
		}

	?>

	<section>
		<div id="container" >
			<a id="tologin"></a>
				<div id="wrapper">
					<div id="login" class="animate form">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$errMsg.'</div>';
				}
			?>
				<form name="registration" action="" method="post" onSubmit=" return formValidation();">
					<h1>Log in<span>ADMIN</span></h1>
						<p>
							<label for="userid">Admin ID:</label>
							<input name="userid" type="text" placeholder="a01"/>
						</p>
						<p>
							<label for="passid">Password:</label>
							<input name="passid" type="password" placeholder="eg. aaa_90EO" />
						</p>
						<p class="login button">
					<input type="submit" name='submit' value="Login"/>
				</p>
				</form>
			</div>
		</div>
	</div>
	</section>
	</body>
	</html>
