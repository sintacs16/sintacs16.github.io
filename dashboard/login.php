<?php
session_start();

  if(isset($_SESSION['id'])) {
    header("Location: ../dashboard/");
    exit;
  }
$msg ="";
include_once("../../includes/db_config.php");
include_once("../../includes/function.php");

if(isset($_POST["login"])) {

  $email = $db->real_escape_string(stripslashes(strip_tags($_POST["email"])));
  $password = md5($db->real_escape_string(stripslashes(strip_tags($_POST["pass"]))));

  $sql = "SELECT id, email, password FROM users WHERE email = '{$email}' LIMIT 1";
  $query = $db->query($sql);
  
  $row = $query->fetch_assoc();
  
  if($password == $row['password']) {
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header("Location: ../dashboard/");
  } else {
    $msg = "Inavlid Username/Password";
  }
}

if(isset($_POST["submit"])) {
  if($_POST["name"] == "" || $_POST["email"] == "" || $_POST["name"] == "" || $_POST["college_name"] == "" || $_POST["department"] == "" || $_POST["year"] < 1 || $_POST["year"] > 4) {
    $msg = "Oops! Something is not right!";
  }
  
  else {
    $name = sanitize_db_input($_POST["name"]);
    
    $college_name = sanitize_db_input($_POST["college_name"]);
    
    $email = sanitize_db_input($_POST["email"]);
    
    $password = $key = substr(md5(rand()), 0, 7);
    
    $hashed_password = md5($password);
    
    $department = sanitize_db_input($_POST["department"]);
    
    $year = sanitize_db_input($_POST["year"]);
    
    $sql  = "INSERT INTO users (name, email, password, college_name, department, year)";
    $sql .=  " VALUES('$name', '$email', '$hashed_password', '$college_name', '$department', $year)";
    
    if ($db->query($sql)) {
      send_mail($name, $email, $password);
      $msg = "Account Sucessfully Created. Check you mailbox for login credintials";
    }
    
    else {
      $msg = "Oops! Something is not right!";
    }
    
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>SINTACS '16 - LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="../js/login.js" async></script>
  <script src="../js/submitwithenter.js" async></script>
  <link rel="stylesheet" href="../css/login.css">
  <body> 
  <?php
    if($msg !== "") {
   echo '<div class="alert alert-warning fade in">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo "<strong> $msg </strong>";
  echo '</div>';
    }
    ?>
    <div class="login-page">
  <div class="form">
    <form class="register-form" action="login" method="post">
      <input type="text" placeholder="name" name="name" required />
      <input type="email" placeholder="email address" name="email" required />
      <input type="text" placeholder="college name" name="college_name" required />
      <input type="text" placeholder="department" name="department" required />
      <input type="number" placeholder="year" name="year" max=4 min=1 required />
      <button name="submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" action="login" method="post">
      <input type="email" placeholder="email id" name="email" />
      <input type="password" placeholder="password" name="pass" class="enter-trig" />
      <button type="submit" name="login" class="trig">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
  </body>
</head>
</html>