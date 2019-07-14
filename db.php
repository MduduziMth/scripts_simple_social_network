<?php

$conn = mysqli_connect('database_server', 'username', 'paasword', 'databasenane: assessment_user');

if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}

?>