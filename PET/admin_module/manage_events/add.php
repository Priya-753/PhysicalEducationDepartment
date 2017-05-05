<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Event</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.event.eventid.focus();">
  <?php


  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $eventid = $eventname = $describe = $venue = $eventdate = $regdate = $teach_id = $level = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['eventid'])){
      $eventid = $_POST['eventid'];
  }
  if(isset($_POST['eventname'])){
      $eventname = $_POST['eventname'];
  }
  if(isset($_POST['describe'])){
      $describe = $_POST['describe'];
  }
  if(isset($_POST['venue'])){
      $venue = $_POST['venue'];
  }
  if(isset($_POST['eventdate'])){
      $eventdate = $_POST['eventdate'];
  }
  if(isset($_POST['regdate'])){
      $regdate = $_POST['regdate'];
  }
  if(isset($_POST['teach_id'])){
      $teach_id = $_POST['teach_id'];
  }
  if(isset($_POST['level'])){
      $level = $_POST['level'];
  }
  $stmt1 = $dbh->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :teach_id");
  $stmt1->bindValue(':teach_id', "%{$teach_id}%");
  $stmt1->execute();
  $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
  if($stmt1->rowCount() > 0){
    $stmt = $dbh->prepare("INSERT INTO eventDetails (eventID,eventName,Description,venue,eventDate,finalReg,teach_ID,level)
      VALUES (:eventid,:eventname,:describe,:venue,:eventdate,:regdate,:teach_id,:level)");
      $stmt->bindParam(':eventid', $eventid);
      $stmt->bindParam(':eventname', $eventname);
      $stmt->bindParam(':describe', $describe);
      $stmt->bindParam(':venue', $venue);
      $stmt->bindParam(':eventdate', $eventdate);
      $stmt->bindParam(':regdate', $regdate);
      $stmt->bindParam(':teach_id', $teach_id);
      $stmt->bindParam(':level', $level);
$stmt->execute();
      $smsg="Event successfully added!";
  echo "<span class='res'>" . $smsg . "</span>";
  }
  else{
    $fmsg="Teacher with this ID does not exist. Enter a valid ID.";
echo "<span class='res'>" . $fmsg . "</span>";
  }
}

    $dbh = null;
    }
catch(PDOException $e)
    {

    echo "<span class='res'>" . $e->getMessage() . "</span>";
    }
?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="event" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Add Event</h1>
                <p>
                  <label for="eventid">Event ID</label>
                  <input name="eventid" type="text" placeholder="E12B90" />
                </p>
                <p>
                  <label for="eventname">Event Name</label>
                  <input name="eventname" type="text" placeholder="Mini Marathon 2k17" />
                </p>
                <p>
                  <label for="describe">Description</label>
                  <textarea name='describe'></textarea>
                </p>
                <p>
                  <label for="venue">Venue</label>
                  <input name="venue" type="text" required="required" placeholder="PSG TECH NCC Ground" />
                </p>
                <p>
                  <label for="eventdate">Date</label>
                  <input name="eventdate" required="required" type="date"/>
                </p>
                <p>
                  <label for="regdate">Date for final registration</label>
                  <input name="regdate" type="date" required="required"/>
                </p>
                <p>
                  <label for="teach_id">Teacher ID</label>
                  <input name="teach_id" type="text" required="required" placeholder="20z202" />
                </p>
                <script type= "text/javascript" src = "level.js"></script>
              <p>
              <label for="level">Level</label>
              <select id="level" name ="level"></select>
            </p>
            <script language="javascript">
              levelSelect("level");
            </script>
    <p class="submit button">
      <input type="submit" name="submit" value="Add"/>
    </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
