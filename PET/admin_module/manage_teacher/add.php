<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Teacher</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="../../registration-form-validation.js"></script>
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.registration.userid.focus();">

  <?php


  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $userid = $uname = $pass = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $dbh->prepare("INSERT INTO teacherProfile (teachID,userName,password)
      VALUES (:userid,:username,:passid)");
      $stmt->bindParam(':userid', $userid);
      $stmt->bindParam(':username', $uname);
      $stmt->bindParam(':passid', $pass);
      if(isset($_POST['userid'])){
          $userid = $_POST['userid'];
      }
      if(isset($_POST['username'])){
          $uname = $_POST['username'];
      }
      if(isset($_POST['passid'])){
          $pass = $_POST['passid'];
      }
      $stmt->execute();
      $smsg="Teacher successfully added.";
  echo "<span class='res'>" . $smsg . "</span>";
}

    $dbh = null;
    }
catch(PDOException $e)
    {
      $fmsg="Teacher with this id is already present.";
    echo "<span class='res'>" . $fmsg . "</span>";
    }
?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="registration" onSubmit="return formValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1>Add Teacher</h1>
                <p>
                  <label for="userid">Employee ID</label>
                  <input name="userid" type="text" placeholder="15a201" />
                </p>
                <p>
                <label for="passid">Password </label>
                <input name="passid" type="password" placeholder="eg. X8df!90EO"/>
                </p>
              <p>
                <label for="confirm_passid">Please confirm password </label>
                <input name="confirm_passid" type="password" placeholder="eg. X8df!90EO"/>
                </p>
                <p>
                 <label for="username">User Name</label>
                 <input name="username" type="text" placeholder="Alex" />
                 </p>
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
