<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Remove Student</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.registration.userid.focus();">
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

			if($username == ''){
				$errMsg .= 'You must enter student roll number<br>';
			}

				$stmt = $databaseConnection->prepare("DELETE FROM studentProfile WHERE studID LIKE :userid");
				$stmt->bindValue(':userid', "%{$username}%");
				$stmt->execute();
        $count= $stmt->rowCount();
        if($count > 0)
        {
          $smsg = "Student removed.";
          echo "<span class='res'>" . $smsg . "</span>";
        }
		 else{
			 $fmsg="Student with that roll number doesn't exist.";
			 echo "<span class='res'>" . $fmsg . "</span>";
		 }
		}
	?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="registration" onSubmit="return confirm('Are you sure?');" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Remove Student</h1>
                <p>
                  <label for="userid">Roll Number</label>
                  <input name="userid" type="text" placeholder="E12B90" />
                </p>

    <p class="submit button">
      <input type="submit" name="submit" value="Remove"/>
    </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
