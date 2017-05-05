<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Event</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
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
			$username = trim($_POST['eventid']);

			if($username == ''){
				$errMsg .= 'You must enter your Event ID<br>';
			}

				$stmt = $databaseConnection->prepare("SELECT * FROM eventDetails WHERE eventID LIKE :eventid");
				$stmt->bindValue(':eventid', "%{$username}%");
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
						 $_SESSION['eventid'] = $username;
						 header('location: update1.php');
				}
		 else{
			 $msg="Event with that ID doesn't exist.";
			 echo "<span class='res'>" . $msg . "</span>";
		 }
		}

	?>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="event" onSubmit="return eventValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Update Event</h1>
                <p>
                  <label for="eventid">Event ID</label>
                  <input name="eventid" type="text" placeholder="E12B90" />
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
