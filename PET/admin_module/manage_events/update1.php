<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Event</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  h2{
    font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
    color: rgb(64, 92, 96);
  }
  </style>
</head>
<body onLoad="document.event.eventname.focus();">
  <?php
  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();
    $event_id = $_SESSION['eventid'];
    $eventname = $describe = $venue = $eventdate = $regdate = $level = "";
    $stmt = $dbh->prepare("SELECT * FROM eventDetails WHERE eventID LIKE :eventid");
    $stmt->bindValue(':eventid', "%{$event_id}%");
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
    $stmt = $dbh->prepare("UPDATE eventDetails SET eventName = :eventname, Description = :describe, Venue = :venue, finalReg = :regdate, eventDate = :eventdate, teach_ID = :teach_id, level = :level WHERE eventID Like :eventid");
    $stmt->bindValue(':eventid', "%{$event_id}%");
    $stmt->bindParam(':eventname', $eventname);
    $stmt->bindParam(':describe', $describe);
    $stmt->bindParam(':venue', $venue);
    $stmt->bindParam(':eventdate', $eventdate);
    $stmt->bindParam(':regdate', $regdate);
    $stmt->bindParam(':teach_id', $teach_id);
    $stmt->bindParam(':level', $level);

      $stmt->execute();
      $smsg="Event successfully updated!";
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
echo $e->getMessage();
    }

?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="event" onSubmit="return eventValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Change the details for <?php echo $event_id; ?></h2>
                <p>
                  <label for="eventname">Event Name</label>
                  <input name="eventname" type="text" value="<?php echo $row['eventName'] ?>"/>
                </p>
                <p>
                  <label for="describe">Description</label>
                  <textarea name='describe'><?php echo $row['Description'] ?></textarea>
                </p>
                <p>
                  <label for="venue">Venue</label>
                  <input name="venue" type="text" value="<?php echo $row['venue'] ?>" />
                </p>
                <p>
                  <label for="eventdate">Date</label>
                  <input name="eventdate" type="date" value="<?php echo $row['eventDate'] ?>"/>
                </p>
                <p>
                  <label for="regdate">Date for final registration</label>
                  <input name="regdate" type="date" value="<?php echo $row['finalReg'] ?>"/>
                </p>
                <p>
                  <label for="teach_id">Teacher ID</label>
                  <input name="teach_id" type="text" value="<?php echo $row['teach_ID'] ?>"/>
                </p>
                <script type= "text/javascript" src = "level.js"></script>
              <p>
              <label for="level">Level</label>
              <select id="level" name ="level">
                <option value="<?php echo $row['level'] ?>" selected><?php echo $row['level'] ?></option>
                <option value="Inter Department">Inter Department</option>
                <option value="Inter College">Inter College</option>
                <option value="District Level">District Level</option>
                <option value="State Level">State Level</option>
                <option value="National Level">National Level</option>
              </select>
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
