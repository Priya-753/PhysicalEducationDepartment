<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Equipment</title>
  <link href="../../styling.css" rel="stylesheet" type="text/css">
  <script src="equip-valid.js"></script>
  <style>
  .res{
    color: black;
  }
  body{
    background-color: skyblue;
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
	?>
  <div style="overflow-x:auto;">
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Atheletics' Group By Type");
      $stmt->execute();
      ?>
      <h1>Atheletics</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Atheletics!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Badminton' Group By Type");
      $stmt->execute();
      ?>
      <h1>Badminton</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Badminton!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Basketball' Group By Type");
      $stmt->execute();
      ?>
      <h1>Basketball</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Basketball!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Cricket' Group By Type");
      $stmt->execute();
      ?>
      <h1>Cricket</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Cricket!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Football' Group By Type");
      $stmt->execute();
      ?>
      <h1>Football</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Football!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Throwball' Group By Type");
      $stmt->execute();
      ?>
      <h1>Throwball</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Throwball!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
    <table>
      <?php
      $i=0;
      $stmt = $databaseConnection->prepare("SELECT Type,Count(type) as Count FROM equipmentDetails WHERE Sport='Volleyball' Group By Type");
      $stmt->execute();
      ?>
      <h1>Volleyball</h1>
      <tr>
        <th>Item</th>
        <th>Count</th>
      </tr>
      <?php
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       ?>
      <tr>
        <td><?php echo $row['Type']; ?></td>
        <td><?php echo $row['Count']; ?></td>
      </tr>
      <?php $i=1;}
      if($i==0){
        ?>
        <tr>
          <td><?php $smsg="No items are available for Volleyball!";
              echo "<span class='res'>" . $smsg . "</span>"; ?>
          </td>
          <td></td>
        </tr>
        <?php }
        else{
          $i=0;
        } ?>
    </table>
</div>
</body>
</html>
