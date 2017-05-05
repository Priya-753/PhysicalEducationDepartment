<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Attendance Update</title>
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
      $studid = $_SESSION['studid'];
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
    $hostname='localhost';
    $username='root';
    $password='briTney753';
    try {
      $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $dateUpdated = $totalHours = $attendedHours = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['dateUpdated'])){
        $dateUpdated = $_POST['dateUpdated'];
    }
    if(isset($_POST['totalHours'])){
        $totalHours = $_POST['totalHours'];
    }
    if(isset($_POST['attendedHours'])){
        $attendedHours = $_POST['attendedHours'];
    }
    $attendancePercent = $attendedHours/$totalHours * 100;
      $stmt = $dbh->prepare("UPDATE studentProfile SET dateUpdated = :dateUpdated, attendancePercent = :attendancePercent WHERE studID Like :studid");
      $stmt->bindValue(':studid', "%{$studid}%");
      $stmt->bindParam(':dateUpdated', $dateUpdated);
      $stmt->bindParam(':attendancePercent', $attendancePercent);
        $stmt->execute();
        $smsg="Attendance successfully updated!";
    echo "<span class='res'>" . $smsg . "</span>";
  }

      $dbh = null;
      }
  catch(PDOException $e)
      {
  echo $e->getMessage();
      }

  ?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="attendance" onSubmit="studvalid()" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Update attendance for <?php echo $studid; ?></h2>
            <p>
                        <label for="dateUpdated" >Updated till</label>
                        <input name="dateUpdated" required="required" type="date">
           </p>
           <p>
             <label for="totalHours">Total Hours</label>
             <input  name="totalHours" type="number" required="required" placeholder="45"/>
             </p>
             <p>
               <label for="attendedHours">Attended Hours</label>
               <input  name="attendedHours" type="number" required="required" placeholder="45"/>
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
