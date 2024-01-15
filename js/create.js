$(document).ready(function(){
    
  $("#submit").click(function(e){

    e.preventDefault();

    var username = $("#myusername").val();
    var password = $("#mypassword").val();
    var email = $("#myemail").val();
    var repwd = $("#retypepwd").val();
    
    if((email == "") || (password == "") || (username == "") ) {
      
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter all the fields</div>");
    }
    else {
      let frm = $('#signup_form').val();
      let formData = new FormData(document.getElementById('signup_form'));
      $.ajax({
        type: "POST",
        url: "createuser.php",
        enctype: "multipart/form-data",
        dataType: "JSON",
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){  
          console.log(data);
          if(data.success == 1 ) {
            $("#message").html("<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+data.message+"</div>");
            setTimeout(() => { window.location="main_login.php" }, 2000);
          }
          else {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+data.message+"</div>");
          }
        },
        error: function()
        {
          
        },
        beforeSend:function()
        {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
        }
      });
    }
    return false;
  });
});
$('#retypepwd').on('keyup', function () {
  console.log($(this).val() +" = " +$('#mypassword').val());
    if ($(this).val() == $('#mypassword').val()) {
        document.getElementById("submit").disabled = false;
        $('#message').html('');
        return true;
    } else{
       document.getElementById("submit").disabled = true;
       $('#message').html("<div class='alert alert-danger alert-dismissible'>\
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>\
       Password does not match!</div>");
       return true;
  }
});