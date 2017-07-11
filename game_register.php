<?php
include("classes/db_connect.php");
$input = $_REQUEST;
if(isset($input)){
  $name = $input['name'];
  $username = $input['user_name'];
  $email = $input['email'];
  $mobile = $input['mobile'];
  $date = date("Y-m-d");
  $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $link->beginTransaction();
  $statement_one = $link->prepare("INSERT into login
  (username,name,mail,mobile,is_flag,is_deleted,modified_at,created_at)
  values ('$username','$name','$email','$mobile','1','0','$date','$date')");
  $check = $statement_one->execute() or die(print_r($link->errorInfo(), true));
  if($check){
    $_SESSION['success'] = 'Data Was Inserted Successfully';
    header('location:register.php');
  }else{
    echo "1";
  }
  $link->commit();
}

?>
