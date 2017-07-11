<?php
session_start();
include("classes/db_connect.php");
$input = $_REQUEST;
if(isset($input["mobile"])){
  if($_SESSION['client_captcha'] == $input['captcha']){
    $mobile=$input["mobile"];
    $query = "SELECT g.* FROM login as g where g.mobile='".$mobile."' and g.is_flag=1 and g.is_deleted=0";
    $result = $link->query($query)or die("Error in the consult." . mysqli_error($link));
    $result_login=$result->rowCount();
    if ($result_login == 1){
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $_SESSION['game_login'] = $row;
        echo 'success';
    }else{
        echo 'login_error';
    }
  }else{
    echo 'error';
  }
}
?>
