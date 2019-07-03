<?php
include('session.php');


?>





<?php include('templates/header2.php'); ?>

<div class="container">
        
        <div class="row justify-content-center">
        
            <div class=col-6>
            <br>
            <br>
            
            <div class="card text-center">
                <div class="card-header">
                 Welcome: Profile
                </div>
                <div class="card-body">
                         <h5 class="card-title"><?php echo $login_session; ?></h5>
                            <p class="card-text"><?php echo $login2_session; ?></p>
                            <p class="card-text"><?php echo $login3_session; ?></p>
                        <a href="edit.php" class="btn btn-outline-primary">Edit Profile</a>
                        <a href="change_password.php" class="btn btn-outline-primary">Change Password</a>
                 </div>
                <div class="card-footer text-muted">
                                   <?php echo date("I  M  Y"); ?>
                </div>
            </div>  
            </div>
        </div>
</div>

