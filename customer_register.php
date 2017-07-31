<?php
include("classes/db_connect.php");

  $postdata = $_REQUEST['form'];
  if(isset($postdata)){
    parse_str($postdata,$input);
    $name = $input['name'];
    $username = $input['user_name'];
    $email = $input['email'];
    $mobile = $input['mobile'];
    $service = $input['service'];
    $provider = $input['provider'];
    $date = date("Y-m-d");
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "SELECT g.* FROM login as g where g.mobile='".$mobile."'";
    $result = $link->query($query)or die("Error in the consult." . mysqli_error($link));
    $result_reg=$result->rowCount();
    if ($result_reg == 1){
        echo 'exist';
    }else{
      $statement_one = $link->prepare("INSERT into login
      (username,name,mail,service,provider,mobile,role,is_flag,is_deleted,modified_at,created_at)
      values ('$username','$name','$email','$service','$provider','$mobile','customer','0','0','$date','$date')");
      $check = $statement_one->execute() or die(print_r($link->errorInfo(), true));
      if($check){
          echo 'success';
      }else{
        echo 'error';
      }
      $link->commit();
    }
  }
?>
