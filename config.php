<?php 
$hostname = '';
$username = '';
$password = '';
$database = 'secure_login';
$conn = new mysqli($hostname,$username,$password,$database);
if($conn->connect_error){
  echo "Cann't connect to the database !";
}
?>