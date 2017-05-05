<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Profile</title>
  <link href="../styling.css" rel="stylesheet" type="text/css">
  <link href="../style_reg.css" rel="stylesheet" type="text/css">
  <script src="update-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  p.submit.button{
  	text-align: right;
  	margin: 5px 0;
  }
  p.button input{
  	width: 30%;
  	cursor: pointer;
  	background: rgb(61, 157, 179);
  	padding: 8px 5px;
  	font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
  	color: #fff;
  	font-size: 24px;
  	border: 1px solid rgb(28, 108, 122);
  	margin-bottom: 10px;
  	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
  	-webkit-border-radius: 3px;
  	   -moz-border-radius: 3px;
  	        border-radius: 3px;
  	-webkit-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
  	        0px 0px 0px 3px rgb(254, 254, 254),
  	        0px 5px 3px 3px rgb(210, 210, 210);
  	   -moz-box-shadow:0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
  	        0px 0px 0px 3px rgb(254, 254, 254),
  	        0px 5px 3px 3px rgb(210, 210, 210);
  	        box-shadow:0px 1px 6px 4px rgba(0, 0, 0, 0.07) inset,
  	        0px 0px 0px 3px rgb(254, 254, 254),
  	        0px 5px 3px 3px rgb(210, 210, 210);
  	-webkit-transition: all 0.2s linear;
  	   -moz-transition: all 0.2s linear;
  	     -o-transition: all 0.2s linear;
  	        transition: all 0.2s linear;
  }
  p.button input:hover{
  	background: rgb(74, 179, 198);
  }
  p.button input:active,
  p.button input:focus{
  	background: rgb(40, 137, 154);
  	position: relative;
  	top: 1px;
  	border: 1px solid rgb(12, 76, 87);
  	-webkit-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
  	   -moz-box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
  	        box-shadow: 0px 1px 6px 4px rgba(0, 0, 0, 0.2) inset;
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

		if(isset($_POST['submit'])){
			session_start();
      $teachid = $_SESSION['userid'];
			$errMsg = '';
			//username and password sent from Form
			$curpass = trim($_POST['curpassid']);
			if($curpass == '')
				$errMsg .= 'You must enter your current Password<br>';


				$stmt = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :userid");
				$stmt->bindValue(':userid', "%{$teachid}%");
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
					 if($userRow['password']==$curpass)
					 {
             $stmt1 = $databaseConnection->prepare("UPDATE teacherProfile SET userName = :username, password = :passid where teachID = :teachid");
               $stmt1->bindParam(':teachid', $teachid);
               $stmt1->bindParam(':username', $uname);
               $stmt1->bindParam(':passid', $pass);
               if(isset($_POST['passid'])){
                   $pass = $_POST['passid'];
               }
               $_SESSION['username'] = $uname;
               $stmt1->execute();
               $smsg="Profile successfully updated";
           echo "<span class='res'>" . $smsg . "</span>";
				}
				else{
					$fmsg="Current password is incorrect";
					echo "<span class='res'>" . $fmsg . "</span>";
				}
		 }
		}

	?>
  <section>
  <div id="container" >
    <a id="toregister"></a>
      <div id="wrapper">
        <div id="register" class="animate form">
          <form name="registration" onSubmit="return formValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     <p>
     <label for="passid">Your new password </label>
     <input name="passid" type="password" placeholder="eg. X8df!90EO"/>
     </p>
   <p>
     <label for="confirm_passid">Please confirm your password </label>
     <input name="confirm_passid" type="password" placeholder="eg. X8df!90EO"/>
     </p>
     <p class="submit button">
       <input type="submit" name="submit" value="Change"/>
     </p>
   </form>
   </div>
         </div>
       </div>
   </section>
 </body>
 </html>
