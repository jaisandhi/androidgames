<?php include("header.php");?>
<script src="js/validate.js"></script>
<script src="js/additional_validate.js"></script>
<style>
.error{
  color:red;
}
.err{
  text-align: center;
  color: red;
  font-size: 15px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading headback text-center">
                  <img src="images/game_logo.png" class="game_logo1">
                  <h4 style="width: 54%;margin-left: 126px;">Register In Android Games</h4>
                </div>
                <div class="panel-body">
                    <form method="post" id="form_register_upload">
                      <h3 class="form_error"></h3>
                      <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                              <div class="form-group">
                                  <label for="name">User Name:</label>
                                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" autocomplete="off">
                              </div>
                              <div class="form-group">
                                  <label for="name">Name:</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" autocomplete="off">
                              </div>
                              <div class="form-group">
                                  <label for="email">Email:</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label for="service">Select Your Service:</label>
                                <select class="form-control" name="service" id="service">
                                  <option value="">Select Service</option>
                                  <option value="etislat">Etislat</option>
                                  <option value="indonesia">Indonesia</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="provider">Select Your Provider:</label>
                                <select class="form-control" name="provider" id="provider">
                                  <option value="">Select Provider</option>
                                  <option value="indosat">Indosat</option>
                                  <option value="xlaxiata">Xlaxiata</option>
                                </select>
                              </div>
                              <div class="form-group">
                                  <label for="mobile">Mobile:</label>
                                  <input type="text" class="form-control mobile" id="mobile" name="mobile" placeholder="Mobile" maxlength="14" autocomplete="off">
                                  <span class="err"></span>
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
          service: {
              required: true
          },
          provider: {
              required: true
          },
      },
      submitHandler: function() {
        $.ajax({
            'type':'post',
            'url' : 'customer_register.php',
            'data':{
              'form' : $('#form_register_upload').serialize()
            },
          success:function(data){
              if(data == 'exist'){
                $('.err,.form_error').text('');
                $('.mobile').css({'background-color':'#a75959','color':'#fff'});
                $('.err').text('Mobile Number Already Exist');
              }else if(data == 'success'){
                $('.mobile').css({'background-color':'#fff','color':'#555'});
                $('.err,.form_error').text('');
                location.href="login.php";
              }else{
                $('.err,.form_error').text('');
                $('.form_error').text('Check Your Data');
              }
          },
        });
      }
  });
});
</script>
<?php include("footer.php"); ?>
