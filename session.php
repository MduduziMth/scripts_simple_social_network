<?php
 require 'db.php';

 session_start();

 //store session
 $user_check=$_SESSION['login_user'];

 // SQL Query To Fetch Complete Information Of User

 
 $sess_sql = "select * from users where User_Email ='$user_check'";
 $sess_sql2 = mysqli_query($conn,$sess_sql);
 $row = mysqli_fetch_assoc($sess_sql2);

 $login_session =$row['User_Email'];
 $login2_session =$row['User_First'];
 $login3_session =$row['User_Last'];

 if(!isset($login_session)){
    mysqli_close($connection); // Closing Connection
    header('Location: login.php'); // Redirecting To Home Page
    }

?>