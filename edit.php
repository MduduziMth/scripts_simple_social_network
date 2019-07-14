<?php
include('session.php');

if (isset($_POST['submit'])) { 

    //Check for empty fields
    if (!$_POST['email']|| !$_POST['last_name'] || !$_POST['first_name'] ) {
       
        die('<script type="text/javascript">alert("You did not complete all of the required fields");location.replace("edit.php")</script>');
       
    }

    //Email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die('<script type="text/javascript">alert("Invalid Email");location.replace("edit.php")</script>');

    }

    $email = $_POST['email'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];

    $sql = "update users set User_Email = '$email', User_First = '$first_name', User_Last = '$last_name' Where User_Email ='$login_session'";
    $query = mysqli_query($conn,$sql);
    header("location: profile.php");


}

?>





<?php include('templates/header2.php'); ?>
<br> 
<div class="container">

    <div class="row justify-content-center">
     
            <div class=col-6>
           
            <h2>Update Profile</h2>
            <br>
                <form action="edit.php" method="POST">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text"   class="form-control" name="first_name">
                    </div>

                    <div class="form-group">
                        <label>Last Name </label>
                        <input type="text"  class="form-control" name="last_name">
                    </div>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text"  class="form-control"name="email">
                        </div>

                        
                    <button type="submit" name="submit"  class="btn btn-outline-primary">Update</button>
                    

                </form>
            </div>
        </div>
     </div>
     <?php include('templates/footer.php'); ?>