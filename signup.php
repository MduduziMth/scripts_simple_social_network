<?php

require 'db.php';
 

//This code runs if the form has been submitted
if (isset($_POST['submit'])) { 

    //This makes sure they did not leave any fields blank
        if (!$_POST['email'] || !$_POST['password1'] || !$_POST['password2'] || !$_POST['last_name'] || !$_POST['first_name'] ) {
        //die('You did not complete all of the required fields');
        die('<script type="text/javascript">alert("You did not complete all of the required fields");location.replace("signup.php")</script>');
    
        }


    $uppercase = preg_match('@[A-Z]@', $_POST['password1']);
    $lowercase = preg_match('@[a-z]@',  $_POST['password1']);
    $number    = preg_match('@[0-9]@',  $_POST['password1']);
    $Special_Character = preg_match('@[0-9]@',  $_POST['password1']);

//passord rules
if(!$uppercase || !$lowercase || !$number || strlen( $_POST['password1']) < 6) {
    die('<script type="text/javascript">alert("Password must comply with rules");location.replace("signup.php")</script>');
}

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die('<script type="text/javascript">alert("Invalid Email");location.replace("signup.php")</script>');
  }

    // checks if the email is in use
    if (!get_magic_quotes_gpc()) {
        $_POST['email'] = addslashes($_POST['email']);
    }

    $usercheck = $_POST['email'];
    $sql ="SELECT User_Email FROM users WHERE User_Email = '$usercheck'";
    $check = mysqli_query($conn,$sql);
    $check2 =  mysqli_num_rows($check);

   

    //if the name exists it gives an error
    if ($check2 != 0) {
    die('Sorry, the username '.$_POST['username'].' is already in use.');
    }

    // this makes sure both passwords entered match
    if ($_POST['password1'] != $_POST['password2']) {
        die('Your passwords did not match. ');
    }

    // here we encrypt the password and add slashes if needed
    $_POST['password1'] = md5($_POST['password1']);
    if (!get_magic_quotes_gpc()) {
	$_POST['password1'] = addslashes($_POST['password1']);
	$_POST['email'] = addslashes($_POST['email']);
    }


    $insert = "INSERT INTO users (User_Email,User_Last,User_First ,User_Password) VALUES ('".$_POST['email']."','".$_POST['last_name']."','".$_POST['first_name']."' ,'".$_POST['password1']."')";
    $add_member = mysqli_query($conn,$insert);

    //redirect to login
    header('Location: login.php');
}



?>


        <?php include('templates/header.php'); ?>
        <br>

        <div class="container">
        <div class="row justify-content-center">
        <div class=col-6>
        <h2>Sign Up</h2>
        <br>
       
            <form action="signup.php" method="POST">

              
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text"  class="form-control" name="first_name">
                </div>

                <div class="form-group">
                    <label>Last Name </label>
                    <input type="text"  class="form-control" name="last_name">
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="text"  class="form-control"name="email">
                    </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  class="form-control"name="password1">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must have at least 1 Uppercase character, 1 lowercase character, 1 special character
                     1 number and must be at least 6 characters long
                    </small> 
                </div>

                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" class="form-control" name="password2">
                </div>
                    
                <button type="submit" name="submit"  class="btn btn-outline-primary">Login</button>

            </form>
            </div>
            </div>
        </div>
        <?php include('templates/footer.php'); ?>

