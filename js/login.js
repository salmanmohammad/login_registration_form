$(document).ready(function(){
    
  $("#login").click(function(){

    var username = $("#username").val();
    var password = $("#login_password").val();
    
    if((username == "") || (password == "")) {
      $("#message").html(prepareAlert("Please enter a username and a password"));
    }
    else {
      $.ajax({
        type: "POST",
        url: "checklogin.php",
        data: "username="+username+"&password="+password,
        success: function(html){ 
          console.log(html);   
          if(html=='true') {
            window.location="index.php";
          }
          else {
            $("#message").html(html);
          }
        },
        beforeSend:function()
        {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});



function prepareAlert(message)
{
  return "<div class='alert alert-danger alert-dismissible'>\
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>\
  "+message+"</div>";
}