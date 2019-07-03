<?php

require 'db.php';
session_start();

$error = '';

if (isset($_POST['submit'])) {
    //check if email and password are empty

    if (empty($_POST['email']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
    else{
    $email=$_POST['email'];
    $_POST['password'] = md5($_POST['password']);
    $password=$_POST['password'];

    $sql = "select * from users where User_password= '$password' AND User_Email='$email'";

    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {
        $_SESSION['login_user' ]= $email; // Initializing Session
        header("location: profile.php"); // Redirecting To Other Profile Page
        }
         else {
        $error = "Username or Password is invalid";
        }
        //mysqli_close($conn); // Closing Connection
    }
    
}



?>


        <?php include('templates/header.php'); ?>
        <br>
        
        <div class="container">
        
            <div class="row justify-content-center">
            
                <div class=col-6>
                    <h2>Login</h2>
                    <br>
                    <span><?php echo $error; ?></span>
                    <form  action="login.php" method="POST">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text"  class="form-control" name="email">
                    </div>

                    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password"  class="form-control" name="password">
                    </div>

                    <button type="submit" name="submit"  class="btn btn-outline-primary">Login</button>

                    </form>
                </div>
            
            </div>
        
        </div>





        <?php include('templates/footer.php'); ?>