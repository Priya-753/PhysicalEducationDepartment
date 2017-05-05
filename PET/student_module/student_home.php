<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STUDENT HOME</title>
  <style>
  #mainNav{
    position: relative;
    top: -10px;
    height: 55px;
    z-index: 150;
    width: 96.175%;
  }
  ul {
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
  ul.nospace.elements{
    background-color: inherit;
  }
  .class{
    max-width: 100%;
    max-height: 100%;
  }

  </style>
  <link href="student_home_style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
  <?php
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
    $stmt1 = $databaseConnection->prepare("SELECT * FROM studentProfile WHERE studID LIKE :studid");
    $stmt1->bindValue(':studid', "%{$studid}%");
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $stud_name = $row['userName'];
  ?>
  <nav id="mainNav">
    <ul>
      <li class="dropdown"><a href="../index.html" title="HOME"><?php echo $stud_name; ?></a>
        <div class="dropdown-content">
          <a href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div class="wrapper row4">
    <div class="hoc container clear">
      <ul class="nospace elements">
        <li class="one_third first">
          <article>
            <figure><img src="../../project/images/s_attendance.jpeg" alt="">
              <figcaption>
                  <a href="attendance.php">View &raquo;</a>
                </figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Attendance</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_event.jpeg" alt="">
              <figcaption><a href="events.php">View All &raquo;</a>
                </figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Events</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_equip.jpeg" alt="">
              <figcaption><a href="borrow_return.php">View &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Equipment</h6>
            </div>
          </article>
        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="wrapper row4">
    <div class="hoc container clear">
      <ul class="nospace elements">
        <li class="one_third first">
          <article>
            <figure><img src="../../project/images/s_fitness.jpeg" alt="">
              <figcaption>
                  <a href="fitness.php">View &raquo;</a>
                </figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fitness</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_achievements.jpeg" alt="">
              <figcaption>
                <a href="view_achievement.php">View &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Achievements</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img class="image" src="../../project/images/s_profile.jpeg" alt="">
              <figcaption><a href="view_profile.php">View Profile &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Profile</h6>
            </div>
          </article>
        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>

</body>
</html>
