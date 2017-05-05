<!DOCTYPE html>
<html lang="en">
<head>
<title>View Events</title>
<meta charset="utf-8">
  <link href="../event_display.css" rel="stylesheet" type="text/css">
  <style>
  .description{
    font-size: 10px;
  }
  .title1{
    font-size: 15px;
    color: #008b8b;
  }
  p{
    font-size: 13px;
  }
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
h2{
  font-size: 20px;
  color: #008CBA;
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
    $stmt = $databaseConnection->prepare("SELECT eventID,eventName,Description,venue,eventDate,finalReg,level FROM eventDetails");
    $stmt->execute();
    session_start();
    $studid = $_SESSION['userid'];
    $i=0;
	?>
<section class="content gallery pad1"><div class="ic"></div>
  <div class="container">
    <div class="row">
      <?php
      $img_no = 0;
      $images = array("../../project/images/sport1.jpeg","../../project/images/sport2.jpeg","../../project/images/sport3.jpeg","../../project/images/sport4.jpeg","../../project/images/sport5.jpeg","../../project/images/sport6.jpeg","../../project/images/sport7.jpeg");
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($i<3){
        $i = $i + 1;
       ?>
      <div class="grid_4">
        <div class="gall_block">
          <div class="maxheight">
            <a href="<?php echo $images[$img_no]; ?>" class="gall_item"><img src="<?php echo $images[$img_no]; if($img_no<6){$img_no=$img_no + 1;}else{$img_no=0;} ?>" alt=""></a>
            <div class="gall_bot">
            <div class="text1"><h1><?php echo $row['eventName'];?></h1>
              <p class="description">
            <?php
            echo $row['Description'];?> <?php
              echo $row['level'];
              ?>

        </p>
        <p class="title1">Venue:</p><p>
          <?php
            echo $row['venue'];?>
          </p>
          <p class="title1">Event Date:</p><p>
          <?php
            echo $row['eventDate'];?>
          </p>
          <p class="title1">Final Registration Date:</p><p>
          <?php
            echo $row['finalReg'];?>
          </p>
        <p><?php $stmt1 = $databaseConnection->prepare("SELECT eventID,studID FROM ParticipateIn where studID = :studid and eventID = :eventid");
        $stmt1->bindValue(':studid',$studid);
        $stmt1->bindValue(':eventid', $row['eventID']);
        $stmt1->execute();
        $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
				if($stmt1->rowCount() > 0){?>
          <h2>Registered!</h2>
        <?php }
        else{
        ?><a href="reg_event.php?eventid=<?php echo $row['eventID'];?>"><button class="button button1">Register</button></a></p>
      <?php } ?> </div>
        </div>
        </div>
      </div>
    </div>
    <?php }
  else{
    $i=1; ?>
    <div class="clear sep__1"></div>
    <div class="grid_4">
      <div class="gall_block">
        <div class="maxheight">
          <a href="<?php echo $images[$img_no]; ?>" class="gall_item"><img src="<?php echo $images[$img_no]; if($img_no<6){$img_no=$img_no + 1;}else{$img_no=0;} ?>" alt=""></a>
          <div class="gall_bot">
          <div class="text1"><h1><?php echo $row['eventName'];?></h1>
            <p class="description">
          <?php
          echo $row['Description'];?> <?php
            echo $row['level'];
            ?>

      </p>
      <p class="title1">Venue:</p><p>
        <?php
          echo $row['venue'];?>
        </p>
        <p class="title1">Event Date:</p><p>
        <?php
          echo $row['eventDate'];?>
        </p>
        <p class="title1">Final Registration Date:</p><p>
        <?php
          echo $row['finalReg'];?>
        </p><p><?php $stmt1 = $databaseConnection->prepare("SELECT eventID,studID FROM ParticipateIn where studID = :studid and eventID = :eventid");
        $stmt1->bindValue(':studid',$studid);
        $stmt1->bindValue(':eventid', $row['eventID']);
        $stmt1->execute();
        $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
				if($stmt1->rowCount() > 0){?>
          <h2>Registered!</h2>
<?php        }
        else{
        ?><a href="reg_event.php?eventid=<?php echo $row['eventID'];?>"><button class="button button1">Register</button></a></p>
      <?php } ?> </div>
      </div>
      </div>
    </div>
  </div>
  <?php }} ?>
  </div>
</div>
</section>
</body>
</html>
