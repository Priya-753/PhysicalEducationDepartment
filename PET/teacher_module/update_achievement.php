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
      $eventID = $level = $sport = $collegeName = $place = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['studid'])){
        $studid = $_POST['studid'];
    }
    if(isset($_POST['eventID'])){
        $eventID = $_POST['eventID'];
    }
    if(isset($_POST['level'])){
        $level = $_POST['level'];
    }
    if(isset($_POST['sport'])){
        $sport = $_POST['sport'];
    }
    if(isset($_POST['place'])){
        $place = $_POST['place'];
    }
    if(isset($_POST['collegeName'])){
        $collegeName = $_POST['collegeName'];
    }
    $stmt1 = $dbh->prepare("SELECT * FROM studentAchievements WHERE studID = :studid and eventID = :eventID");
    $stmt1->bindValue(':studid', $studid);
    $stmt1->bindParam(':eventID', $eventID);
    $stmt1->execute();
    $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
    if($stmt1->rowCount() > 0){
      $smsg="Achievement for this event is already updated!";
  echo "<span class='res'>" . $smsg . "</span>";
}else{
    $stmt2 = $dbh->prepare("SELECT * FROM eventDetails WHERE eventID = :eventID");
    $stmt2->bindParam(':eventID', $eventID);
    $stmt2->execute();
    $eventRow=$stmt2->fetch(PDO::FETCH_ASSOC);
        if($stmt2->rowCount() > 0){
          $stmt = $dbh->prepare("INSERT INTO studentAchievements (studID,eventID,place,collegeName)
            VALUES (:studid,:eventID,:place,:collegeName)");
            $stmt->bindValue(':studid', $studid);
            $stmt->bindParam(':eventID', $eventID);
            $stmt->bindParam(':place', $place);
            $stmt->bindParam(':collegeName', $collegeName);
              $stmt->execute();
              $smsg="Achievement successfully updated!";
          echo "<span class='res'>" . $smsg . "</span>";

      }
        else{
          $smsg="No such event! Check the event ID.";
      echo "<span class='res'>" . $smsg . "</span>";
  }
}
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
            <h2>Update achievements for <?php echo $studid; ?></h2>
            <input  name="studid" type="hidden" value="<?php echo $studid; ?>"/>
            <p>
              <label for="eventID">Event ID</label>
              <input name="eventID" type="text"/>
            </p>
             <p>
               <label for="place">Place</label>
               <select id="place" name ="place">
                 <option value="First">First</option>
                 <option value="Second">Second</option>
                 <option value="Third">Third</option>
                 <option value="Partcipation">Partcipation</option>
               </select>
             </p>
             <p>
               <label for="collegeName">College which organised the event </label>
               <input  name="collegeName" type="text" placeholder="SRM"/>
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
