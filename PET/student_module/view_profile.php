<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>View Profile</title>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.container {
  padding: 0 16px;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
h2,h1{
  color: #9ACD32;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}
a{
  color: white;
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
    $stmt = $databaseConnection->prepare("SELECT * FROM studentProfile WHERE studID = :studid");
    $stmt->bindValue(':studid', $studid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
<h2 style="text-align:center">Student Profile</h2>

<div class="card">
  <div class="imgcontainer">
    <img src="../../project/images/s_profile_icon.jpeg" alt="Avatar" class="avatar">
  </div>
    <div class="container">
    <h1><?php echo $row['userName']; ?></h1>
    <p class="title">Physical Education Department</p>
    <p><button><a href="update_profile.php">Update</a>
</button></p>
  </div>
</div>

</body>
</html>
