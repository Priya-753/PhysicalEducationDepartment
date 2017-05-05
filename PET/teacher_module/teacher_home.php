<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TEACHER HOME</title>
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
  <link href="teacher_home_style.css" rel="stylesheet" type="text/css" media="all">
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
    $teachid = $_SESSION['userid'];
    $_SESSION['teach_id'] = $teachid;
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
                  <a href="attendance_for_student1.php">View &raquo;</a>
                  <a href="attendance_for_student.php">Update &raquo;</a>
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
              <figcaption><a href="../admin_module/manage_events/view.php">View All &raquo;</a>
                <a href="view_incharge.php">View Incharge &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Events</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_equip.jpeg" alt="">
              <figcaption><a href="../admin_module/manage_equipment/view.php">View All &raquo;</a></figcaption>
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
            <figure><img src="../../project/images/s_class.jpeg" alt="">
              <figcaption>
                  <a href="../admin_module/manage_teacher_class/view1.php">View incharge &raquo;</a>
                </figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Classes</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_achievements.jpeg" alt="">
              <figcaption>
                  <a href="ach_for_student1.php">View &raquo;</a>
                  <a href="ach_for_student.php">Update &raquo;</a>
                </figcaption>
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
