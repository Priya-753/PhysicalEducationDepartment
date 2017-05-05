<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Return Equipment</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.equip.equipid.focus();">
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
    $studid = $_SESSION['userid'];

		if(isset($_POST['submit'])){
			$errMsg = '';
			//username and password sent from Form
			$username = trim($_POST['equipid']);

			if($username == ''){
				$errMsg .= 'You must enter Equipment ID<br>';
			}

				$stmt = $databaseConnection->prepare("SELECT * FROM equipmentDetails WHERE equipID = :equipid and status = 'ua'");
				$stmt->bindValue(':equipid', $username);
				$stmt->execute();
				$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0)
				{
						 $stmt1 = $databaseConnection->prepare("UPDATE equipmentDetails SET status = 'a', borrowed = 'none' where equipID = :equipid");
             $stmt1->bindValue(':equipid', $username);
             $stmt1->execute();
             $msg="Equipment Returned";
             echo "<span class='res'>" . $msg . "</span>";
				}
		 else{
			 $msg="Equipment with that ID is not borrowed.";
			 echo "<span class='res'>" . $msg . "</span>";
		 }
		}

	?>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="equip" onSubmit="return eventValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Return Equipment</h1>
                <p>
                  <label for="equipid">Equipment ID</label>
                  <input name="equipid" type="text" placeholder="E12B90" />
                </p>
    <p class="submit button">
      <input type="submit" name="submit" value="Return"/>
    </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
