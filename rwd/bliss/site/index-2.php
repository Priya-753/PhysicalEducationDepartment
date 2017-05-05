<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Registration Form</title>
  <script src="js/registration-form-validation.js"></script>
  <link rel="stylesheet" href="css/form_rl.css">
  <style>
  .res{
    color: white;
  }
  </style>
</head>
<body onLoad="document.registration.username.focus();">
  <?php
  $hostname='localhost';
  $username='root';
  $password='briTney753';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=doglover",$username,$password);

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $uname = $pass = $phno = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $dbh->prepare("INSERT INTO userProfile (userName,password,phoneNumber)
      VALUES (:username,:passid,phno)");
      $stmt->bindParam(':username', $uname);
      $stmt->bindParam(':passid', $pass);
      $stmt->bindParam(':phno', $phno);
      if(isset($_POST['username'])){
          $uname = $_POST['username'];
      }
      if(isset($_POST['passid'])){
          $pass = $_POST['passid'];
      }
      if(isset($_POST['phno'])){
          $phno = $_POST['phno'];
      }
      $stmt->execute();
}

    $dbh = null;
    }
catch(PDOException $e)
    {
      $fmsg="This user name and phone number is already registered";
    }
?>
  <header>
    <section id="stuck_container">
      <div class="container">
        <div class="row">
          <div class="grid_12">
          <h1>
            <a href="index.html">
              <img src="images/logo.png" alt="Logo alt">
            </a>
          </h1>
            <div class="navigation">
              <nav>
                <ul class="sf-menu">
                 <li class="current"><a href="index.html">home</a></li>
                 <li><a href="index-2.html">sign up</a></li>
                 <li><a href="index-3.html">login</a></li>
               </ul>
              </nav>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </header>

  <section>
    <div id="container" >
      <a id="toregister"></a>
        <div id="wrapper">
          <div id="register" class="animate form">
            <form name="registration" onSubmit="return formValidation();" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h1> Sign Up</h1>
            <p>
             <label for="username">User Name</label>
             <input name="username" type="text" placeholder="Alex" />
             </p>
                <p>
                <label for="passid">Your password </label>
                <input name="passid" type="password" placeholder="eg. X8df!90EO"/>
                </p>
              <p>
                <label for="confirm_passid">Please confirm your password </label>
                <input name="confirm_passid" type="password" placeholder="eg. X8df!90EO"/>
                </p>
                <p>
                 <label for="phno">Phone Number</label>
                 <input name="phno" type="number"/>
                 </p>
    <p class="signin button">
      <input type="submit" name="submit" value="Sign up"/>
    </p>
    <p class="change_link">
      Already a member ?
      <a href="login.php" class="to_register"> Go and log in </a>
    </p>
  </form>
  </div>
        </div>
      </div>
  </section>
</body>
</html>
