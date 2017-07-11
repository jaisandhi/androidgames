<?php include("header.php");
session_start();
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 60;
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    unset($_SESSION['success']);
}
$_SESSION['LAST_ACTIVITY'] = $time;
?>
<script src="js/validate.js"></script>
<script src="js/additional_validate.js"></script>
<style>
.error{
  color:red;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h4 class="text-center" style="color:#1e9e51"><?php if(!empty($_SESSION['success'])){ echo $_SESSION['success']; };?></h4>
            <div class="panel panel-default">
                <div class="panel-heading headback text-center">
                  <img src="images/game_logo.png" class="game_logo1">
                  <h4 style="width: 54%;margin-left: 126px;">Register In Android Games</h4>
                </div>
                <div class="panel-body">
                    <form method="post" id="form_register_upload" action="game_register.php">
                      <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                              <div class="form-group">
                                  <label for="name">User Name:</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" >
                              </div>
                              <div class="form-group">
                                  <label for="name">Name:</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
                              </div>
                              <div class="form-group">
                                  <label for="email">Email:</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" >
                              </div>
                              <div class="form-group">
                                  <label for="mobile">Mobile:</label>
                                  <input type="text" class="form-control mobile" id="mobile" name="mobile" placeholder="Mobile" maxlength="14">
                              </div>
                              <div class="form-group">
                                  <input class="btn btn-primary center-block pull-left" value="Register Here" type="submit" id="register_but">
                                  <input class="btn btn-danger pull-right" value="Reset" type="reset" id="reset_btn">
                              </div>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<Script>
$(function ($) {
  $('#form_register_upload').validate({
      rules: {
          user_name: {
              required: true,
          },
          name: {
              required: true,
          },
          email: {
              required: true,
              email: true
          },
          mobile: {
              required: true
          },
      }
  });
});
</script>
<?php include("footer.php"); ?>
