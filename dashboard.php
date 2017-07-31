<?php session_start();include("classes/db_connect.php");
if(!isset($_SESSION[ 'game_login'])){
  header( 'location:login.php');
}
$urlflag = filter_input( INPUT_GET, 'flag', FILTER_SANITIZE_URL );
if($urlflag == 2 || $urlflag == 0){
  session_destroy();
  header( 'location:login.php');
}
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
<script src="js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}
var urlflag = decodeURIComponent($.urlParam('flag'));
var urlmobile = decodeURIComponent($.urlParam('msisdn'));
if(urlflag == 2 || urlflag == 0){
  window.location.href = "login.php";
  $.removeCookie("flag");
}else{
  if($.cookie("flag") != 1){
    $.ajax({
    'type':'post',
    url:"game_login_check.php?mode=updatevalidate&flag="+urlflag+"&mobile="+urlmobile,
      success:function(data){
        var json = JSON.parse(data);
        $.cookie("flag", json.is_flag);
      },
    });
  }
}
</script>
<style>
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
.loader_img{
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
  top: 43%;
  left: 32%;
  color: #fff;
}
</style>
</head>
<body class="home">
  <div class="loader_img">
    <img src="game_images/car_loader_alpha-3.gif" alt="loader" class="loader">
  </div>
  <div class="overlay"></div>
    <div class="container-fluid display-table loader_close">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="dashboard.php">
                        <h1 class="hidden-xs hidden-sm" style="font-size: 22px;color: #fff;font-family: serif;">Android<span style="color: #5383d3;">Games</span></h1>
                        <h1 class="visible-xs visible-sm circle-logo" style="font-size: 22px;color: #fff;font-family: serif;">Android<span style="color: #5383d3;">Games</span></h1>
                        <!-- <img src="images/game_logo.png" alt="game_logo" class="hidden-xs hidden-sm">
                        <img src="images/game_logo.png" alt="game_logo" class="visible-xs visible-sm circle-logo"> -->
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active">
                          <a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a>
                        </li>
                        <?php if($_SESSION['game_login']['role'] == "admin"){?>
                        <!-- <li class="">
                          <a href="game_register.php"><i class="fa fa-gamepad" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Game Register</span></a>
                        </li> -->
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <h1 class="" style="font-size: 22px;font-family: serif;">Welcome to Android<span style="color: #5383d3;">Games</span></h1>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <?php echo $_SESSION[ 'game_login'][ 'username'];?>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <p class="text-muted small">
                                                        <?php echo $_SESSION[ 'game_login'][ 'mail'];?>
                                                    </p>
                                                    <div class="divider"></div>
                                                    <a href="logout.php" class="btn btn-danger">Logout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <img src="game_images/bggif.gif" style="width:100%;">
                        <h2 class="img_text">Welcome To Android Games</h2>
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
                <div class="user-dashboard" id="original">
                  <h1>Latest Games</h1>
                  <div class="row">
                    <?php $query = "SELECT * FROM search_gameby_category where status=0 and is_deleted=0";
                      $sql = $link->prepare($query);$sql->execute();foreach($sql as $row) { ?>
                    <div class="col-md-4">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title"><img src="<?php echo $row['game_image'];?>"></h4>
                            </div>
                            <div class="panel-body">
                                <h4><?php echo $row['game_name'];?></h4>
                                <p> <?php echo substr($row['game_description'],0,200);?> </p>
                            </div>
                            <div class="panel-footer text-center">
                                <a class="btn btn-danger btn-sm download" href="javascript:void(0);" data-apk-file="<?php echo $row['apk_file_path'];?>" onclick="downloadfile('<?php echo $row['apk_file_path'];?>')" target="_self">Download</a>
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
</html>
