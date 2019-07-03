<?php

$conn = mysqli_connect('localhost', 'Mdupla', 'qwerty', 'assessment_user');

if(!$conn){
	echo 'Connection error: '. mysqli_connect_error();
}

?>