<?php

session_start();
$conn = mysqli_connect('localhost','root');
if($conn){
  echo "connection ";
}else {
  echo"fail BC";
}

$db = mysqli_select_db($conn,'reg');

if (isset($_POST['submit'])) {
  // code...
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "select * from user where user='$username' and pass='$password' ";

  $query = mysqli_query($conn,$sql);

  $row = mysqli_num_rows($query);
    if($row==1){
      echo "login successful";
      $_SESSION['user'] = $username;
      header('location:adminpage.php');
    }
    else{
      echo "login fail huva lol";
      header('location:login.php');
    }
  }

?>
