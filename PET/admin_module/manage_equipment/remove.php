<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Remove Equipment</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="equip-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.equi.equipid.focus();">
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
			$username = trim($_POST['equipid']);

			if($username == ''){
				$errMsg .= 'You must enter your Equipment ID<br>';
			}

				$stmt = $databaseConnection->prepare("DELETE FROM equipmentDetails WHERE equipID LIKE :equipid");
				$stmt->bindValue(':equipid', "%{$username}%");
				$stmt->execute();
        $count= $stmt->rowCount();
        if($count > 0)
        {
          $smsg = "Equipment removed.";
          echo "<span class='res'>" . $smsg . "</span>";
        }
		 else{
			 $fmsg="Equipment with that ID doesn't exist.";
			 echo "<span class='res'>" . $fmsg . "</span>";
		 }
		}
	?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="equi" onSubmit="return equipValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Remove Equipment</h1>
                <p>
                  <label for="equipid">Equipment ID</label>
                  <input name="equipid" type="text" placeholder="E12B90" />
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
