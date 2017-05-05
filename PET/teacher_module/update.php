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
  </style>
</head>
<body onLoad="document.classes.teach_id.focus();">
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
    $eventid = "";
    $winner =  "";
		if(isset($_POST['submit'])){
			$errMsg = '';
      if(isset($_POST['eventid'])){
          $eventid = $_POST['eventid'];
      }
      if(isset($_POST['winner'])){
          $winner = $_POST['winner'];
      }

        $stmt = $databaseConnection->prepare("UPDATE eventDetails SET winner = :winner where eventID = :eventid");
        $stmt->bindParam(':winner', $winner);
        $stmt->bindParam(':eventid', $eventid);
        $stmt->execute();

        $smsg="Winner successfully updated!";
        header('location: view_incharge.php');
    echo "<span class='res'>" . $smsg . "</span>";
  }

	?>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="classes" onSubmit="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Update Winner</h1>
              <p>
                <input name="eventid" type="hidden" value="<?php echo $_GET['eventid'] ?>" />
              </p>
              <p>
                <label for="winner">Winner</label>
                <input name="winner" type="text" placeholder="Psg Tech Boys Team" />
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
