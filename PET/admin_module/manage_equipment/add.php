<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Equipment</title>
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


  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $equipid = $sport = $type = "" ;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $dbh->prepare("INSERT INTO equipmentDetails (equipID,Sport,Type)
      VALUES (:equipid,:sport,:type)");
      $stmt->bindParam(':equipid', $equipid);
      $stmt->bindParam(':sport', $sport);
      $stmt->bindParam(':type', $type);
      if(isset($_POST['equipid'])){
          $equipid = $_POST['equipid'];
      }
      if(isset($_POST['sport'])){
          $sport = $_POST['sport'];
      }
      if(isset($_POST['type'])){
          $type = $_POST['type'];
      }
      $stmt->execute();
      $smsg="Equipment successfully added!";
  echo "<span class='res'>" . $smsg . "</span>";
}

    $dbh = null;
    }
catch(PDOException $e)
    {
      $fmsg="Equipment with this ID is already present";
    echo "<span class='res'>" . $fmsg . "</span>";
    }

?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="equi" onSubmit="return equipValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Add Equipment</h1>
                <p>
                  <label for="equipid">Equipment ID</label>
                  <input name="equipid" type="text" placeholder="E12B90" />
                </p>
                <script type= "text/javascript" src = "sportType.js"></script>
                <p>
              	<label for="sport">Sport</label>
                <select id="sport" name ="sport"></select>
              </p>
              <p>
              	<label for="type">Type</label>
                <select name ="type" id ="type"></select>
              </p>
              <script language="javascript">
              	findSport("sport", "type");
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
