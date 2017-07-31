<?php session_start();include("classes/db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Games - Dashboard </title>
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<script src="js/jquery-1.js"></script>
<script src="js/bootstrap.js"></script>
<style>
body {
  background-image: url(images/bg.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.col-md-3{
  /*height:0px;*/
}
.panel-front {
  margin-bottom: 20px;
  margin-top: 20px;
}
.panel-front .panel-heading .panel-title img {
    border-radius: 3px 3px 0px 0px;
    width: 100%;
}
.panel-front .panel-heading {
    padding: 0px;
}
.panel-front .panel-heading h4 {
    line-height: 0;
}
.panel-front .panel-body h4 {
    font-weight: bold;
    margin-top: 5px;
    margin-bottom: 15px;
}
.panel-body {
  padding: 15px;
  background: rgba(200, 186, 212, 0.17);
}
/*.loader_img{
  position: absolute;
  right: 0;
  top: 33%;
  z-index: 99999;
  left: 36%;
  opacity: 1;
}
.loader_close{
  opacity:0;
}
.img_text{
  position: absolute;
  top: 40%;
  left: 37%;
  color: #fff;
}*/
.user-welcome {
  margin-bottom: 10px;
}
</style>

</head>
<body class="">
    <div class="display-table">
        <div class="row display-table-row">
            <div class="col-md-12">
                <div class="user-welcome">
                  <div class="row">
                    <div class=" col-xs-12 col-md-12">
                        <img src="game_images/welbg.gif" style="width:100%;">
                        <!-- <h2 class="img_text">Welcome To Android Games</h2> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                    <select class="form-control category" id="category" name="category">
                      <option value="default">SubCategory</option>
                      <?php $query = "SELECT * FROM game_category where category_status=0";$sql = $link->prepare($query);$sql->execute();foreach($sql as $row) { ?>
                         <option value="<?php echo $row['id']?>"><?php echo $row['category_name'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="user-welcome" id="original">
                  <h1 style="text-align:center;color:#fff">Latest Games</h1>
                  <div class="row form-row">
                    <?php $query = "SELECT * FROM search_gameby_category where status=0 and is_deleted=0";
                      $sql = $link->prepare($query);$sql->execute();foreach($sql as $row) { ?>
                    <div class="col-md-3">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                  <img src="<?php echo $row['game_image'];?>">
                                </h4>
                            </div>
                            <div class="panel-body">
                                <h4><?php echo $row['game_name'];?></h4>
                                <p> <?php echo substr($row['game_description'],0,200);?> </p>
                            </div>
                            <div class="panel-footer text-center">
                                <a class="btn btn-danger btn-sm download_login" href="javascript:void(0);" data-apk-file="<?php echo $row['apk_file_path'];?>" onclick="downloadfile('<?php echo $row['apk_file_path'];?>')" target="_self">Download</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
<Script>
$('.category').on('change',function(){
var $this = $(this);
if($('.category option:selected').val() == 'default'){
  var form_url = "/games";
  window.location.replace(form_url);
}else{
  var form_url = 'game_category_filter.php';
    $.ajax({
    'type':'post',
    'url' : form_url,
    'data':{
    'selected_category_id' : $('.category option:selected').val(),
    },
  success:function(data){
   if(data == "error"){
     $("#original").find('.row').empty();
    //  $("#original").find('.load_button').remove();
     $('#original.user-welcome').find('h1').text($this.find('option:selected').text() + ' Games');
     $("#original").find('.row').append('<h4 style="text-align: center;color: #c5bfbf;" id="failute_text">No Games Found in ' +$this.find('option:selected').text()+'</h4>');
   }else{
     $("#original").find('.row').empty();
    //  $("#original").find('.load_button').remove();
     var jsonparse = JSON.parse(data);
     $('#original.user-welcome').find('h1').text($this.find('option:selected').text() + ' Games');
     $(jsonparse).each(function(key,value){
      $("#original").find('.row').append('<div class="col-md-3">'+
         '<div class="panel panel-default panel-front">'+
             '<div class="panel-heading">'+
                 '<h4 class="panel-title"><img src="'+value.game_image+'"></h4>'+
             '</div>'+
             '<div class="panel-body">'+
                 '<h4>'+value.game_name+'</h4> <p>'+value.game_description.substring(0,200)+'</p>'+
             '</div>'+
             '<div class="panel-footer text-center">'+
                 '<a class="btn btn-danger btn-sm download_login" href="javascript:void(0);" data-apk-file="'+value.apk_file_path+'" onclick="downloadfile('+value.apk_file_path+')" target="_self">Download</a>'+
             '</div>'+
         '</div>'+
      '</div>');
     });
   }
  },
  });
}
});

function downloadfile(urlParam,login) {
  if(login == 1){
    location.href="login.php";
  }else{
    // var gamepath = urlParam.substring(1);
    // window.open('http://localhost/'+ gamepath,'_blank');
  }
}

$(document).on('click', '.download_login', function(e) {
  downloadfile($(this).attr('data-apk-file'),1);
});
</script>
</html>
