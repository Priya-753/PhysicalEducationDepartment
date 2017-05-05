<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Achievements Update</title>
  <link href="../styling.css" rel="stylesheet" type="text/css">
  <link href="../style_reg.css" rel="stylesheet" type="text/css">
  <script src="valid.js"></script>
  <style>
  .res{
    color: white;
  }
  h2{
    font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
    color: rgb(64, 92, 96);
  }
  nav ul li{
    float: right;
  }
  </style>
</head>
<body onLoad="document.attendance.studid.focus();">
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
      $teachid = $_SESSION['userid'];
      $stmt1 = $databaseConnection->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :teachid");
      $stmt1->bindValue(':teachid', "%{$teachid}%");
      $stmt1->execute();
      $row = $stmt1->fetch(PDO::FETCH_ASSOC);
      $teach_name = $row['userName'];
    ?>
    <nav id="mainNav">
      <ul>
        <li class="dropdown"><a href="../index.html" title="HOME"><?php echo $teach_name; ?></a>
          <div class="dropdown-content">
            <a href="teacher_home.php">Home</a>
            <a href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <?php
		if(isset($_POST['submit'])){
			$errMsg = '';
			//username and password sent from Form
			$username = trim($_POST['studid']);

			if($username == ''){
				$errMsg .= 'You must enter a Student Roll Number<br>';
			}

				$stmt = $databaseConnection->prepare("SELECT * FROM studentProfile WHERE studID LIKE :studid");
				$stmt->bindValue(':studid', "%{$username}%");
				$stmt->execute();
        $count= $stmt->rowCount();
        if($count > 0)
        {
           $_SESSION['studid'] = $username;
         header('location: update_achievement.php');
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
            <form name="attendance" onSubmit="studvalid()" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Enter Student Roll Number:</h2>
                <p>
                  <label for="studid">Roll Number</label>
                  <input name="studid" type="text" placeholder="15z201" />
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
