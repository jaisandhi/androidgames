<?php session_start(); if(!isset($_SESSION[ 'game_login'])){ header( 'location:login.php'); }else{ } ?>
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
    <script>
        $(document).ready(function() {
            $('[data-toggle="offcanvas"]').click(function() {
                $("#navigation").toggleClass("hidden-xs");
            });
        });
    </script>
    <style>
    .game_head{
      width: 89px;
      float: right;
      cursor: pointer;
      color: #8e7979;
      font-family: serif;
      font-weight: normal;
    }
    .game_free{
      width: 86px;
      float: right;
      color: #2dd02d;
      text-decoration: underline;
    }
    .game_image{
      width: 58%;
      border: 1px solid #ccc;
      padding: 5px;
      float:left;
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
    .text-right {
        margin-top: 10px;
    }
    .text-right {
      margin-top: 10px;
      width: 38%;
      float: right;
    }
    .text-left {
      margin-top: 10px;
      width: 38%;
      float: left;
      color: #39ab39;
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
    <script>
$(".loader_img").show();
  setTimeout(function () {
     $('.loader_img').hide();
     $(".loader_close").css('opacity','1');
  }, 3000);
    </script>
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
                        <li class="active"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a>
                        </li>
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
                  <div class="col-xs-12 col-md-12 row">
                      <img src="game_images/bggif.gif" style="width:103%;">
                      <h2 class="img_text">Welcome To Android Games</h2>
                  </div>
                </div>
                <div class="user-dashboard">

                  <h1>Action Games</h1>
                  <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a HREF="#"><img src="game_images/subway.png"></a></h4>
                            </div>
                            <div class="panel-body">
                                <h4>Subway Surfers</h4> Subway Surfers is an endless runner mobile game co-developed by Kiloo, and SYBO Games, private companies based in Denmark. It is available on Android, iOS, Kindle, and Windows Phone platforms.
                                <div class="text-right">
                                    <a href="" class="btn btn-danger btn-sm" role="button">Download</a>
                                </div>
                                <div class="text-left">
                                  Free
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a HREF="#"><img src="game_images/got.png"></a></h4>
                            </div>
                            <div class="panel-body">
                                <h4>Game Of Thrones</h4> Game of Thrones - A Telltale Games Series is a six part episodic game series set in the world of HBO's groundbreaking TV show. This new story tells of House Forrester, a noble family from the north of Westeros, loyal to the Starks of Winterfell.
                                <div class="text-right">
                                    <a href="" class="btn btn-danger btn-sm" role="button">Download</a>
                                </div>
                                <div class="text-left">
                                  Free
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default panel-front">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a HREF="#"><img src="game_images/wd-2.png"></a></h4>
                            </div>
                            <div class="panel-body">
                                <h4>The Walking Dead: Season Two</h4> The Walking Dead: Season Two is a five-part (Episodes 2-5 can be purchased via in-app) game series that continues the story of Clementine, a young girl orphaned by the undead apocalypse. Left to fend for herself, she has been forced to learn how to survive in a world gone mad.
                                <div class="text-right">
                                    <a href="" class="btn btn-danger btn-sm" role="button">Download</a>
                                </div>
                                <div class="text-left">
                                  Free
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-info btn-sm" style="margin-bottom:5px">See More</a>
                    </div>
                  </div>

                </div>
                <div class="user-dashboard">
                  <h1>Games Starter Kit</h1>
                    <div class="row" style="margin-bottom:5px">
                        <div class="col-md-3">
                          <img src="game_images/subway_surfers.png" class="game_image">
                          <p class="game_head">Subway Surfers</p>
                          <p class="game_free">Free </p>
                        </div>
                        <div class="col-md-3">
                          <img src="game_images/candy_crush_saga.png" class="game_image">
                          <p class="game_head">Candy Crush Saga </p>
                          <p class="game_free">Free </p>
                        </div>
                        <div class="col-md-3" >
                          <img src="game_images/moto_rider.png" class="game_image">
                          <p class="game_head">Moto Rider GO: Highway Traffic </p>
                          <p class="game_free">Free </p>
                        </div>
                        <div class="col-md-3" >
                          <img src="game_images/train_racing_game.png" class="game_image">
                            <p class="game_head">Train Racing Game </p>
                          <p class="game_free">Free </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-sm btn-primary" style="margin-bottom:5px">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
