<?php
$status = '';
if(isset($_POST['login'])){
  //check if account is locked
  $sql = 'select * from security';
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $locked = $row['locked_time'];
    }
  }
  //current time
  $time = time();
  if ($time < $locked) {
     $status = '<span style="color:red">Account is currently locked for security reasons!</span>';
  } else {
    //check login info 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //protects against sql injections
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $sql = "select * from admin where username='$username' and password='$password'";
    $result = $conn->query($sql);
    $last_login = date('d/m/Y');
    $ip_address = $_SERVER['REMOTE_ADDR'];
    if ($result->num_rows > 0) {
       $status = '<span style="color:green">Login Success</span>';
       $sqls = array(
         "update security set locked_time=0",
         "update security set attempt=2",
         "update security set last_login='$last_login'",
         "update security set ip_address='$ip_address'"
        );
       foreach($sqls as $sql){
          $conn->query($sql);
       }
    } else {
       $sql = 'select * from security';
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
                $attempt = $row['attempt'];
          }
        }
       if ($attempt == 0) {
          //lock account 
          $time = $time + 3600;
          $sqls = array(
            "update security set locked_time=$time",
            "update security set attempt=2"
          );
          foreach($sqls as $sql){
             $conn->query($sql);
          }
          $status = '<span style="color:red">Account is currently locked for security reasons!</span>';
        } else {
          //set attempt
          $attempt = $attempt - 1;
          $sql = "update security set attempt=$attempt";
          $result = $conn->query($sql);
          $status = '<span style="color:red">Login Failed!</span>';
        }
      }
    }
}
?>