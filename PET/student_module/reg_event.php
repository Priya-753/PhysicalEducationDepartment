<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Winner</title>
  <link href="../styling.css" rel="stylesheet" type="text/css">
  <link href="../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  div#register.animate.form{
    height: 50px;
  }
  </style>
</head>
<body>
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

$studid = "";
session_start();
  $studid = $_SESSION['userid'];
		if(isset($_POST['submit'])){
			$errMsg = '';
      if(isset($_POST['eventid'])){
          $eventid = $_POST['eventid'];
      }
        $stmt = $databaseConnection->prepare("INSERT INTO ParticipateIn (studID,eventID)
          VALUES (:studid,:eventid)");
          $stmt->bindParam(':studid', $studid);
        $stmt->bindParam(':eventid', $eventid);
        $stmt->execute();
        header('location: events.php');
  }
	?>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="classes" onSubmit="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <p>
                <label>Are you sure you want to register?</label>
                <input name="eventid" type="hidden" value="<?php echo $_GET['eventid'] ?>" />
              </p>
            </p>
            <p class="submit button">
              <input type="submit" name="submit" value="Confirm"/>
            </p>
            </form>
            </div>
        </div>
    </div>
  </section>
</body>
</html>
