<?php

    require 'db.php';

    if (isset($_POST['submit'])) {

        if (!$_POST['password1']|| !$_POST['password2'] || !$_POST['password3'] ) {
       
            die('<script type="text/javascript">alert("You did not complete all of the required fields");location.replace("change_password.php")</script>');
           
        }

    if ($_POST['password2'] != $_POST['password3']) {
        die('<script type="text/javascript">alert("passowrds are not the same");location.replace("edit.php")</script>');
    }
    $password1= md5($_POST['password1']);
   

    //check whether the password exists
    $sql1 = "Select User_Password from users where User_Password = '$password1'";
    $query1 =mysqli_query($conn,$sql1);
    $query2 =  mysqli_num_rows($query1);

    //if not set passowrd rules
    if($query2 != 0){
    
        $uppercase = preg_match('@[A-Z]@', $_POST['password1']);
        $lowercase = preg_match('@[a-z]@',  $_POST['password1']);
        $number    = preg_match('@[0-9]@',  $_POST['password1']);
        $Special_Character = preg_match('@[\W]@',  $_POST['password1']);
    
    //passord rules
    if(!$uppercase || !$lowercase || !$number || strlen( $_POST['password1']) < 6) {
        die('<script type="text/javascript">alert("Password must comply with rules");location.replace("change_password.php")</script>');
    }
  
   
    $Newpassword=  md5($_POST['password2']);

    $sql = "update users set User_Password = '$Newpassword' Where User_Email ='$login_session'";
    $query = mysqli_query($conn,$sql);

    if($query){
       
        header("location: profile.php");
    }
}
    die('<script type="text/javascript">alert("Invalid Old password");location.replace("change_password.php")</script>');
    

}

?>

<?php include('templates/header2.php'); ?>

    <br>
    <div class="container">

        <div class="row justify-content-center">
            
            <div class=col-6>
            
            <h2>Change Password</h2>
            <br>

                <form action="change_password.php" method="POST">

                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="password1">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password2">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password3">
                </div>

            <button type="submit" name="submit"  class="btn btn-outline-primary">Update Password</button>

                </form>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>