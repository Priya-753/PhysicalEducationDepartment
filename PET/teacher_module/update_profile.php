<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Profile</title>
  <link href="../styling.css" rel="stylesheet" type="text/css">
  <link href="../style_reg.css" rel="stylesheet" type="text/css">
  <script src="../registration-form-validation.js"></script>
  <style>
  .res{
    color: white;
  }
  a{
    color: white;
  }
  button:hover, a:hover {
    opacity: 0.7;
  }
  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  </style>
</head>
<body onLoad="document.registration.username.focus();">
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
    session_start();
    $teachid = $_SESSION['userid'];
    $stmt = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :userid");
    $stmt->bindValue(':userid', "%{$teachid}%");
    $stmt->execute();
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

		if(isset($_POST['submit'])){

			$errMsg = '';
			//username and password sent from Form
			$username = trim($_POST['username']);
			$password = trim($_POST['curpassid']);
      $newpassword = trim($_POST['passid']);
			if($username == ''){
				$errMsg .= 'You must enter your Name<br>';
			}
			if($password == '')
				$errMsg .= 'You must enter your Password<br>';

				if($stmt->rowCount() > 0)
				{
					 if($userRow['password']==$password)
					 {
             $stmt1 = $databaseConnection->prepare("UPDATE teacherProfile SET userName = :username, password = :passid WHERE teachID Like :userid");
             $stmt1->bindValue(':userid', "%{$teachid}%");
             $stmt1->bindValue(':username', $username);
             $stmt1->bindParam(':passid', $newpassword);
             $stmt1->execute();
             $smsg="Profile successfully updated!";
         echo "<span class='res'>" . $smsg . "</span>";
           }
				}
				else{
					$fmsg="Current password is incorrect";
					echo "<span class='res'>" . $fmsg . "</span>";
				} 
		 }
	?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="registration" onSubmit="return formValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Update Profile</h1>
            <p>
             <label for="username">User Name</label>
             <input name="username" type="text" value="<?php echo $userRow['userName'] ?>" />
             </p>

             <p>Change Password:
             <label for="curpassid">Current password </label>
             <input name="curpassid" type="password" placeholder="eg. X8df!90EO"/>
             </p>
             <p>
             <label for="passid">Your new password </label>
             <input name="passid" type="password" placeholder="eg. X8df!90EO"/>
             </p>
           <p>
             <label for="confirm_passid">Please confirm your password </label>
             <input name="confirm_passid" type="password" placeholder="eg. X8df!90EO"/>
             </p>
         <p class="submit button">
           <input type="submit" name="submit" value="Update"/>
         </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
