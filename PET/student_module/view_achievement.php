<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Achievements</title>
  <link href="../teacher_module/achieve.css" rel="stylesheet" type="text/css">
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
    session_start();
    $studid = $_SESSION['userid'];
    $stmt = $databaseConnection->prepare("SELECT * FROM studentAchievements where studid = :studid");
    $stmt->bindValue(':studid',$studid);
    $stmt->execute();
    $i=1;
	?>
  <div class="wrapper row2">
    <section class="hoc container clear">
      <div class="sectiontitle">
        <h6 class="heading">Achievements</h6>
      </div>
      <ul class="nospace group services">
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $eventid = $row['eventID'];
        $stmt1 = $databaseConnection->prepare("SELECT * FROM eventDetails where eventID = :eventid");
        $stmt1->bindParam(':eventid',$eventid);
        $stmt1->execute();
        $eventrow = $stmt1->fetch(PDO::FETCH_ASSOC);
        if($i<3){
        $i = $i + 1;
       ?>
          <li class="one_third">
            <article class="infobox">
              <h2 class="heading"><i class="fa fa-balance-scale"></i><?php echo $eventrow['eventName']; ?></h2>
              <p><?php echo $row['collegeName']; ?></br>Event Date:<?php echo $eventrow['eventDate']; ?></br>Level:<?php echo $eventrow['level']; ?></br>Place:<?php echo $row['place']; ?> </p>
            </article>
          </li>
    <?php }
    else{
      $i=1; ?>
    <div class="clear"></div>
    <li class="one_third">
      <article class="infobox">
        <h6 class="heading"><i class="fa fa-balance-scale"></i><?php echo $eventrow['eventName']; ?></h6>
        <p>Venue: <?php echo $eventrow['venue']; ?></br>Event Date:<?php echo $eventrow['eventDate']; ?></br>Level:<?php echo $eventrow['level']; ?></br></p>
      </article>
    </li>
  <?php }} ?>
  <div class="clear"></div>
</section>
</div>
</body>
</html>
