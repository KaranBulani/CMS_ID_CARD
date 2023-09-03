<?php
session_start();
$conn = mysqli_connect('localhost','root');
if($conn){
  echo "connection ";
}else {
  echo"fail BC";
}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body>

  <form class="" action="logincheck.php" method="post">


    <label>Username</label>
    <input type="text" name="user" value="">
    <br>

    <label>Password</label>
    <input type="text" name="pass" value="">
    <br>

    <input type="submit" name="submit" value="login">

  </form>

</body>
</html>
