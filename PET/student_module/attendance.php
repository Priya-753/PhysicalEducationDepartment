<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Attendance</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <link href="../../style_reg.css" rel="stylesheet" type="text/css">
  <style>
  .res{
    color: black;
  }
  table, th, td{border:1px solid; border-collapse:collapse; vertical-align:center;}
  table{
    border-top: 40px;
  }
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
    $studid = $_SESSION['userid'];
	?>
  <div style="overflow-x:auto;">
    <table>
      <?php
      $stmt = $databaseConnection->prepare("SELECT dateUpdated,attendancePercent FROM studentProfile WHERE studID LIKE :studid");
      $stmt->bindValue(':studid', "%{$studid}%");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
      <tr>
        <th>Attendance Percent</th>
        <th>Date Updated</th>
      </tr>
      <tr>
        <td><?php echo $row['attendancePercent']; ?></td>
        <td><?php echo $row['dateUpdated']; ?></td>
      </tr>
    </table>
</div>
</body>
</html>
