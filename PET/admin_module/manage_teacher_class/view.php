<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Classes</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  h2{
    font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
    color: rgb(64, 92, 96);
  }
  </style>
</head>
<body onLoad="document.event.eventid.focus();">
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
			$username = trim($_POST['teach_id']);

			if($username == ''){
				$errMsg .= 'You must enter teacher ID<br>';
			}

				$stmt = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :teach_id");
				$stmt->bindValue(':teach_id', "%{$username}%");
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
						 $_SESSION['teach_id'] = $username;
						 header('location: view1.php');
				}
		 else{
			 $msg="Teacher with that ID doesn't exist.";
			 echo "<span class='res'>" . $msg . "</span>";
		 }
		}

	?>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="classes" onSubmit="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>View Class of</h2>
                <p>
                  <label for="teach_id">Teacher ID</label>
                  <input name="teach_id" type="text" placeholder="E12B90" />
                </p>
    <p class="submit button">
      <input type="submit" name="submit" value="View"/>
    </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
