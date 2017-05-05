<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Remove Teacher</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
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

    if(isset($_POST['submit'])){
      session_start();
			$errMsg = '';
      if(isset($_POST['teach_id'])){
          $teachid = $_POST['teach_id'];
      }
      if(isset($_POST['class1'])){
          $class1 = $_POST['class1'];
      }

			if($teachid == ''){
				$errMsg .= 'You must enter your Event ID<br>';
			}

				$stmt = $databaseConnection->prepare("DELETE FROM teacherClass WHERE teach_ID = :teach_id and className = :class1");
				$stmt->bindParam(':teach_id', $teachid);
        $stmt->bindParam(':class1', $class1);
				$stmt->execute();
        $count= $stmt->rowCount();
        if($count > 0)
        {
          $smsg = "Teacher and class relationship removed.";
          echo "<span class='res'>" . $smsg . "</span>";
        }
		 else{
			 $fmsg="Teacher with that ID doesn't teach that class.";
			 echo "<span class='res'>" . $fmsg . "</span>";
		 }
		}
	?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="classes" onSubmit="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Remove</h1>
              <p>
                <label for="teach_id">Teacher</label>
                <input name="teach_id" type="text" placeholder="10z201" />
            </p>
            <script type= "text/javascript" src = "classes.js"></script>
          <p>
          <label for="class1">Class</label>
          <select id="class1" name ="class1"></select>
        </p>
        <script language="javascript">
          classSelect("class1");
        </script>
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
