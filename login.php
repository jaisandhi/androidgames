<?php include('header.php');?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading headback text-center">
                  <img src="images/game_logo.png" class="game_logo">
                  <h4 style="width: 54%;margin-left: 96px;">Sign in to continue</h4>
                  
                </div>
                <div class="panel-body">
                    <form method="post">
                      <div class="row">
                          <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                              <div class="form-group">
                                <input class="form-control mobile" placeholder="Mobile" id="mobile" name="mobile" type="text" maxlength="14">
                              </div>
                              <div class="form-group">
                                  <p><img src="captcha.php" style="border:1px solid #ccc;width: 100%;height: 35px;"  alt="CAPTCHA"></p>
                                  <p><input type="text" size="6" class="form-control" placeholder="Captcha" id="captcha" maxlength="5" name="captcha" value="">
                              </div>
                              <div class="form-group">
                                  <span id="add_err"></span>
                              </div>
                              <div class="form-group">
                                  <div id="loader" style="display:none;">
                                    <img src="images/ajax-loader.gif">
                                    <span style="color:#357ebd;">Validating...</span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <input class="btn btn-primary center-block login" value="Login" type="submit" id="log_but">
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
$(document).ready(function() {
    $("#log_but").click(function () {
        mobile = $("#mobile").val();
        captcha = $("#captcha").val();
        if ($("#mobile").val() == "" && $("#captcha").val() == "") {
            $("#add_err").empty();
            $("#add_err").html("<span style='color:red;'>Please enter mobile and Match Captcha</span>");
            $("#loader").css("display", "none");
        }else if ($("#mobile").val() == "") {
            $("#add_err").empty();
            $("#add_err").html("<span style='color:red;'>Please enter mobile</span>");
            $("#loader").css("display", "none");
        }else if ($("#mobile").val().length != 14) {
            $("#add_err").empty();
            $("#add_err").html("<span style='color:red;'>Mobile number max 14 digits</span>");
            $("#loader").css("display", "none");
        }else if ($("#captcha").val() == "") {
            $("#add_err").empty();
            $("#add_err").html("<span style='color:red;'>Please enter captcha</span>");
            $("#loader").css("display", "none");
        }else {
            $("#add_err").empty();
            $.ajax({
                type: "POST",
                url: "game_login_check.php?mobile=" + mobile + "&captcha=" + captcha,
                success: function (html) {
                    if(html == 'error'){
                        $("#add_err").css("display", "block");
                        $("#loader").css("display", "none");
                        $("#add_err").html("<span style='color:red;'>check your captcha</span>");
                    }else if(html == 'success'){
                        $("#loader").css("display", "none");
                        $("#add_err").css("display", "none");
                        window.location.href = "dashboard.php";
                    }else if(html == 'login_error'){
                        $("#add_err").html("<span style='color:red;'>Check Your Mobile Number</span>");
                        $("#loader").css("display", "none");
                    }
                },
                beforeSend: function () {
                    $("#loader").css("display", "block");
                }
            });
        }
        return false;
    });
});
</Script>
<?php include('footer.php');?>
