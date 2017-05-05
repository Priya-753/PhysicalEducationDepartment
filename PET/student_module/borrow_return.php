<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Equipment Management</title>
  <link href="student_home_style.css" rel="stylesheet" type="text/css" media="all">
  <style>
  div.group.center{
    padding: 0 10px 0 10px;
  }
  </style>
</head>
<body>
  <?php  session_start();
    $studid = $_SESSION['userid']; ?>
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="center btmspace-80">
        <h2 class="heading font-x3">Equipment Management</h2>
      </div>
      <div class="group center">
        <article class="one_quarter"><i class="icon fa fa-balance-scale">--></i>
          <h4 class="font-x1 uppercase"><a href="manage_equip/borrow.php">Borrow Equipment</a></h4>
          <p>Borrow an equipment.</p>
        </article>
        <article class="one_quarter"><i class="icon fa fa-plane"><--</i>
          <h4 class="font-x1 uppercase"><a href="manage_equip/return.php">Return Equipment</a></h4>
          <p>Return an equipment.</p>
        </article>
      </div>
          <div class="clear"></div>
    </main>
  </div>
</body>
</html>
