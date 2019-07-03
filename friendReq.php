<?php

include('session.php');
$slqUsers = "select  User_Last,User_First from users JOIN friends ON users.User_Id = friends.F_UserOne  WHERE F_Status = 'P' and User_Email <> '$login_session'";
$usersql= mysqli_query($conn,$slqUsers);

?>

<?php include('templates/header2.php'); ?>
<br>
<br>
<?php include('templates/friendheader.php'); ?>
<div class="container">
        
        <div class="row justify-content-center">
        
            <div class=col-4>
                <h4>Friend Request</h4>
                <?php
        
                while ($user =  mysqli_fetch_assoc($usersql))
                {
                    ?>
                <br>
                <div class="card">
                    <div class="card-body text-center">
                    <i class="fas fa-user-friends"></i>
                        
                        <p class="card-title"><td><?php echo $user['User_First']; ?></p>
                        <p class="card-title"><td><?php echo $user['User_Last']; ?></p>
                        <p>sent you a friend request</p>
                        <a href="friendReq.php" class="btn btn-outline-success">Accept request</a>
                        <a href="friendReq.php" class="btn btn-outline-danger">Decline request</a>
                    </div>
                </div>
              <?php  
                }
                ?>
            </div>
        </div>
</div>