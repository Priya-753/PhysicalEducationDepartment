
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Login Form (teacher)</title>
<link href="styling.css" rel="stylesheet" type="text/css">
<link href="style_login.css" rel="stylesheet" type="text/css">
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
			$password = trim($_POST['password']);

			if($username == ''){
				$errMsg .= 'You must enter your Roll Number<br>';
			}
			if($password == '')
				$errMsg .= 'You must enter your Password<br>';


				$stmt = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :userid");
				$stmt->bindValue(':userid', "%{$username}%");
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
					 if($userRow['password']==$password)
					 {
						 $_SESSION['userid'] = $username;
						 header('location: teacher_module/teacher_home.php');
				}
				else{
					$fmsg="password or roll number incorrect";
					echo "<span class='res'>" . $fmsg . "</span>";
				}
		 }
		 else{
			 $msg="Please register!";
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
				<form action="" method="post">
					<h1>Log in<span>TEACHER</span></h1>
						<p>
							<label for="userid">Employee ID</label>
							<input name="userid" type="text" placeholder="15a201"/>
						</p>
						<p>
							<label for="password">Password:</label>
							<input name="password" type="password" placeholder="eg. aaa_90EO" />
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
