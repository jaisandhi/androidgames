<?php
session_start();
include("classes/db_connect.php");
if(isset($_REQUEST['mode'])){
  if($_REQUEST['mode'] == 'updatevalidate'){
    $input = $_REQUEST;
    if(isset($input)){
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $link->beginTransaction();
      $query = "SELECT g.* FROM login as g where g.id='".$_SESSION['game_login']['id']."'";
      $result = $link->query($query)or die("Error in the consult." . mysqli_error($link));
      $result_reg=$result->rowCount();
      if ($result_reg == 1){
        $sql = "UPDATE login SET is_flag='".$input['flag']."' WHERE id='".$_SESSION['game_login']['id']."'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $stmt->rowCount();
        unset($_SESSION["game_login"]);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        $_SESSION['game_login'] = $row;
        echo json_encode($row);
      }else{
          echo 'error';
      }
    }
  }
}else{
  $input = $_REQUEST;
  if(isset($input["mobile"])){
    if($_SESSION['client_captcha'] == $input['captcha']){
      $mobile=$input["mobile"];
      $query = "SELECT g.* FROM login as g where g.mobile='".$mobile."' and g.is_deleted=0";
      $result = $link->query($query)or die("Error in the consult." . mysqli_error($link));
      $result_login=$result->rowCount();
      if ($result_login == 1){
          $result->setFetchMode(PDO::FETCH_ASSOC);
          $row = $result->fetch();
          $_SESSION['game_login'] = $row;
          echo json_encode($row);
      }else{
          echo 'login_error';
      }
    }else{
      echo 'error';
    }
  }
}
?>
