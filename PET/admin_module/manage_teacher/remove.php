<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Remove Teacher</title>
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
				$errMsg .= 'You must enter teacher ID.<br>';
			}

				$stmt = $databaseConnection->prepare("DELETE FROM teacherProfile WHERE teachID LIKE :userid");
				$stmt->bindValue(':userid', "%{$username}%");
				$stmt->execute();
        $count= $stmt->rowCount();
        if($count > 0)
        {
          $smsg = "Teacher removed.";
          echo "<span class='res'>" . $smsg . "</span>";
        }
		 else{
			 $fmsg="Teacher with that ID doesn't exist.";
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
            <h1>Remove Teacher</h1>
                <p>
                  <label for="userid">Teacher ID</label>
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
