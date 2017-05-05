<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>ADMIN HOME</title>
  <style>
  #mainNav{
    position: relative;
    top: -10px;
    height: 55px;
    z-index: 150;
    width: 100%;
  }
  ul.nospace.elements{
    background-color: inherit;
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
  </style>
  <link href="admin_home_style.css" rel="stylesheet" type="text/css">
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
    $adminid = $_SESSION['userid'];
    $stmt1 = $databaseConnection->prepare("SELECT * FROM adminDetails WHERE adminID = :adminid");
    $stmt1->bindValue(':adminid', $adminid);
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $admin_name = $row['userName'];
  ?>
  <nav id="mainNav">
    <ul>
    <li class="dropdown"><a href="../index.html" title="HOME"><?php echo $admin_name; ?></a>
    </ul>
  </nav>
  <?php
  ?>
  <div class="wrapper row4">
    <div class="hoc container clear">
      <ul class="nospace elements">
        <li class="one_third first">
          <article>
            <figure><img src="../../project/images/s_equip.jpeg" alt="">
              <figcaption><a href="manage_equip.php">Manage Equipment &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Equipment</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_event.jpeg" alt="">
              <figcaption><a href="manage_event.php">Manage Events &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Events</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_class.jpeg" alt="">
              <figcaption><a href="manage_class.php">Assign Classes &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Classes</h6>
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
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_student.jpeg" alt="">
              <figcaption><a href="manage_student.php">Manage Students &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Student</h6>
            </div>
          </article>
        </li>
        <li class="one_third">
          <article>
            <figure><img src="../../project/images/s_teacher.jpeg" alt="">
              <figcaption><a href="manage_teacher.php">Manage Teachers &raquo;</a></figcaption>
            </figure>
            <div class="txtwrap">
              <h6 class="heading">Teacher</h6>
            </div>
          </article>
        </li>
      </ul>
      <div class="clear"></div>
      </div>
      </div>

      </body>
      </html>
