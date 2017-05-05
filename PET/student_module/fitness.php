<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>View Fitness</title>
  <link href="fitness.css" rel="stylesheet" type="text/css">
  <style>
  #mainNav{
    position: relative;
    top: -10px;
    height: 55px;
    z-index: 150;
    width: 100%;
  }
  ul.nav{
      height: 55px;
      list-style-type: none;
      margin: 0;
      padding-bottom: 10px;
      width: 100%;
      overflow: scroll;
      background-color: black;
  }
  li a, .dp{
      padding: 18px 35px;
      color: #ffe4e1;
      font-size: 16px;
      font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
      letter-spacing: .02em;
      text-decoration:underline;
      display:block;
  }

  li a:hover, .dropdown:hover .dropbtn {
      background-color: #ffe4e1;
      color: #CD5C5C;
  }

  li.dropdown {
      display: inline-block;
  }

  .dropdown-content {
      display: none;
      position: absolute;
      background-color: #dcdcdc;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  }

  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
  }

  .dropdown-content a:hover {
    background-color: #c0c0c0;
    color: black;
  }

  .dropdown:hover .dropdown-content {
      display: block;
  }

  li{
    float:right;
  }
.wrapper.bgded{
   background-image: url('../../project/images/s_bmi.jpeg');
   background-size: 512px 500px;
   background-position: left;
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
    session_start();
    $studid = $_SESSION['userid'];
      $stmt = $databaseConnection->prepare("SELECT userName,weight,height FROM studentProfile WHERE studID = :studid");
      $stmt->bindValue(':studid', $studid);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $stud_name = $row['userName'];
      ?>
      <nav id="mainNav">
        <ul class="nav">
          <li class="dropdown"><a href="../index.html" title="HOME"><?php echo $stud_name; ?></a>
            <div class="dropdown-content">
              <a href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
      <?php $weight = $row['weight'];
      $height = $row['height'];
      $bmi = ($weight/($height * $height)) * 10000;
      if($bmi<18.5){
      ?>
      <div class="wrapper bgded">
        <div class="hoc split clear">
          <section>
            <h2 class="heading">Under Weight</h2>
            <p>Your BMI is <?php echo $bmi; ?></p>
            <h3>Tips</h3>
            <p class="btmspace-30">Eat more frequently.</br>Choose nutrient-rich foods.</br>Try smoothies and shakes.</br>Yoga.</br>Weight lifting.</br></p>
          </section>
        </div>
      </div>
      <?php } else if((18.5 < $bmi) && ($bmi < 24.9)){
      ?>
      <div class="wrapper bgded">
        <div class="hoc split clear">
          <section>
            <h2 class="heading">Normal Weight</h2>
            <p>Your BMI is <?php echo $bmi; ?></p>
            <h3>Tips</h3>
            <p class="btmspace-30">Build more lean muscle.</br>Fight off hunger with more filling foods.</br>Plan your meals in advance.</br>Weigh yourself daily.</br>Eat breakfast.</br></p>
          </section>
        </div>
      </div>
      <?php } else if((25 < $bmi) && ($bmi < 29.9)){
      ?>
      <div class="wrapper bgded">
        <div class="hoc split clear">
          <section>
            <h2 class="heading">Over Weight</h2>
            <p>Your BMI is <?php echo $bmi; ?></p>
            <h3>Tips</h3>
            <p class="btmspace-30">Squats.</br>Wall Push-Ups.</br>Medicine Ball Slams.</br>Cardio.</br>Use Circuits.</br></p>
          </section>
        </div>
      </div>
      <?php } else{
      ?>
      <div class="wrapper bgded">
        <div class="hoc split clear">
          <section>
            <h2 class="heading">Obese</h2>
            <p>Your BMI is <?php echo $bmi; ?></p>
            <h3>Tips</h3>
            <p class="btmspace-30">Changing Your Diet to Fight Morbid Obesity.</br>Brisk walking.</br>Water exercise and cycling.</br>Weigh yourself daily.</br> Discover Weight Training.</br></p>
          </section>
        </div>
      </div>
      <?php } ?>

</body>
</html>
