<?php
include('classes/db_connect.php');
$input = $_REQUEST;
if(isset($input)){
  $query = "SELECT * FROM search_gameby_category where category_id='".$input['selected_category_id']."' and status=0 and is_deleted=0";
  $result = $link->query($query)or die("Error in the consult." . mysqli_error($link));
  $result_filter=$result->rowCount();
  if ($result_filter >= 1){
      $result->setFetchMode(PDO::FETCH_ASSOC);
      while($row = $result->fetchAll()){
        echo json_encode($row);
      }
  }else{
      echo 'error';
  }
}
?>
