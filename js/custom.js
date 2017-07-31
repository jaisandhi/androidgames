function downloadfile(urlParam) {
  var gamepath = urlParam.substring(1);
  window.open('http://localhost/'+ gamepath,'_blank');
}

$(document).on('click', '.download', function(e) {
  downloadfile($(this).attr('data-apk-file'));
});

$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return results[1] || 0;
}
var urlflag = decodeURIComponent($.urlParam('flag'));
var urlmobile = decodeURIComponent($.urlParam('msisdn'));
  $(document).ready(function() {
  $(".loader_img").show();
  setTimeout(function () {
     $('.loader_img').hide();
     $(".loader_close").css('opacity','1');
  }, 3000);

  $('li').on('click',function(){
    $('li').removeClass('active');
    $(this).addClass('active');
  });
  $('.category').on('change',function(){
  var $this = $(this);
  if($('.category option:selected').val() == 'default'){
    var form_url = "dashboard.php?msisdn="+urlmobile+"&flag="+urlflag+"";
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
       $("#original").find('.load_button').remove();
       $('#original.user-dashboard').find('h1').text($this.find('option:selected').text() + ' Games');
       $("#original").find('.row').append('<h4 style="padding: 16px;text-align: center;color: #9e8383;" id="failute_text">No Results Found in ' +$this.find('option:selected').text()+'</h4>');
     }else{
       $("#original").find('.row').empty();
       $("#original").find('.load_button').remove();
       var jsonparse = JSON.parse(data);
       $('#original.user-dashboard').find('h1').text($this.find('option:selected').text() + ' Games');
       $(jsonparse).each(function(key,value){
        $("#original").find('.row').append('<div class="col-md-4">'+
           '<div class="panel panel-default panel-front">'+
               '<div class="panel-heading">'+
                   '<h4 class="panel-title"><img src="'+value.game_image+'"></h4>'+
               '</div>'+
               '<div class="panel-body">'+
                   '<h4>'+value.game_name+'</h4> <p>'+value.game_description.substring(0,200)+'</p>'+
               '</div>'+
               '<div class="panel-footer text-center">'+
                   '<a class="btn btn-danger btn-sm download" href="javascript:void(0);" data-apk-file="'+value.apk_file_path+'" onclick="downloadfile('+value.apk_file_path+')" target="_self">Download</a>'+
               '</div>'+
           '</div>'+
        '</div>');
       });
     }
    },
    });
  }
  });

  $('[data-toggle="offcanvas"]').click(function() {
    $("#navigation").toggleClass("hidden-xs");
  });
});
