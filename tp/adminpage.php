<?php
session_start();
if(isset($_SESSION['user'])) {

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <div class=""> mera naam hai
       <?php echo $_SESSION['user'] ?>
       and yeh mene session se uthaya
     </div>
     <br>
     <p>URL se kholke dikha yeh</p>
     <br>
     <a href="logout.php">LOGOUT</a>

   </body>
 </html>
<?php
}

else {
  echo "You're Not Signed In";
  header('location:login.php');
}
 ?>
