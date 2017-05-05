<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Classes</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <script src="event-valid.js"></script>
  <style>
  .res{
    color: black;
  }
  table, th, td{border:1px solid; border-collapse:collapse; vertical-align:top;}
  table, th{table-layout:auto;}
  table{width:100%; margin-bottom:15px;}
  th, td{padding:5px 8px;}
  td{border-width:0 1px;}
  table, th, td{border-color:#D7D7D7;}
  th{color:#FFFFFF; background-color:#373737;}
  tr{color:inherit; background-color:#FBFBFB;}
  tr:nth-child(even){color:inherit; background-color:#F7F7F7;}
  table{background-color:inherit;}
  h1{
    font-family: "NOTEWORTHY","APPLE CHNCERY",sans-serif;
    color: #ffe4e1;
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
    $teachid = $_SESSION['teach_id'];
	?>
  <div style="overflow-x:auto;">
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT className FROM teacherClass where teach_ID = :teachid");
      $stmt->bindValue(':teachid', $teachid);
      $stmt->execute();
      ?>
      <tr>
        <th>Classes</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['className']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="The teacher does not supervise any class.";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
</div>
</body>
</html>
