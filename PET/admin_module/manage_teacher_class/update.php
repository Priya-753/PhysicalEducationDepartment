<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Class</title>
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
$teachid = $classc = $class1 = "";
		if(isset($_POST['submit'])){
			session_start();
			$errMsg = '';
			//username and password sent from Form
      if(isset($_POST['teach_id'])){
          $teachid = $_POST['teach_id'];
      }
      if(isset($_POST['classc'])){
          $classc = $_POST['classc'];
      }
      if(isset($_POST['class1'])){
          $class1 = $_POST['class1'];
      }
      $stmt1 = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :teach_id");
      $stmt1->bindValue(':teach_id', "%{$teachid}%");
      $stmt1->execute();
      $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
      if($stmt1->rowCount() > 0){
        $stmt = $databaseConnection->prepare("UPDATE teacherClass SET className = :class1 where teach_ID = :teach_id and className = :classc");
        $stmt->bindParam(':teach_id', $teachid);
        $stmt->bindParam(':class1', $class1);
        $stmt->bindParam(':classc', $classc);
        $stmt->execute();
      if($stmt->rowCount() > 0){
        $smsg="Class successfully updated!";
    echo "<span class='res'>" . $smsg . "</span>";
  }
  else{
    $msg="The teacher doesn't handle the selected class.";
echo "<span class='res'>" . $msg . "</span>";
  }
  }
  else{
    $fmsg="Teacher with that Id doesn't exist.";
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
              <h1>Update Classes</h1>
              <p>
                <label for="teach_id">Teacher</label>
                <input name="teach_id" type="text" placeholder="10z201" />
            </p>
            <script type= "text/javascript" src = "classes.js"></script>
          <p>
          <label for="classc">Current Class</label>
          <select id="classc" name ="classc"></select>
        </p>
        <script language="javascript">
          classSelect("classc");
        </script>
            <script type= "text/javascript" src = "classes.js"></script>
          <p>
          <label for="class1">Class</label>
          <select id="class1" name ="class1"></select>
        </p>
        <script language="javascript">
          classSelect("class1");
        </script>
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
