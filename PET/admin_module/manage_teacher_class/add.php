<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Assign Classes</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="class-valid.js"></script>
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.classes.teach_id.focus();">
  <?php
  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=physicalEducationDepartment",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $teachid = $class1 =  "";
if(isset($_POST['submit'])){
  if(isset($_POST['teach_id'])){
      $teachid = $_POST['teach_id'];
  }
  if(isset($_POST['class1'])){
      $class1 = $_POST['class1'];
  }
  $stmt1 = $dbh->prepare("SELECT * FROM teacherProfile WHERE teachID LIKE :teach_id");
  $stmt1->bindValue(':teach_id', "%{$teachid}%");
  $stmt1->execute();
  $userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
  if($stmt1->rowCount() > 0){
    $stmt = $dbh->prepare("INSERT INTO teacherClass (teach_ID,className)
      VALUES (:teach_id,:class1)");
      $stmt->bindParam(':teach_id', $teachid);
      $stmt->bindParam(':class1', $class1);
      $stmt->execute();
      $smsg="Class successfully assigned!";
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
      $fmsg=$e->getMessage();
    echo "<span class='res'>" . $fmsg . "</span>";
    }

?>
  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="classes" onSubmit="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <h1>Assign Classes</h1>
              <p>
                <label for="teach_id">Teacher</label>
                <input name="teach_id" type="text" placeholder="10z201" />
            </p>
            <script type= "text/javascript" src = "classes.js"></script>
          <p>
          <label for="class1">Class</label>
          <select id="class1" name ="class1"></select>
        </p>
        <script language="javascript">
          classSelect("class1");
        </script>
            <p class="submit button">
              <input type="submit" name="submit" value="Assign"/>
            </p>
            </form>
            </div>
        </div>
    </div>
  </section>
</body>
</html>
