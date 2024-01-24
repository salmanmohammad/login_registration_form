$(document).ready(function(){
    
  //Form submit process
$("#signup").click(function(e){

    document.getElementById("signup").disabled = true;

    e.preventDefault();

    var username = $("#username").val();
    var password = $("#password").val();
    var email = $("#email").val();
    var repwd = $("#retypepwd").val();
    var profile = $("#profile").val();

    //Scroll to top of form
    $("html, body").animate({ scrollTop: 0 }, "slow");

    //Check required fields
    if((email == "") || (password == "") || (username == "")  || (profile == "")) {
      $("#signup").prop('disabled', false);

      $("#message").html(prepareAlert("Please enter all required fields"));
      return false;
    }
    else if (!isEmail(email)) {
      $("#signup").prop('disabled', false);

      $('#message').html(prepareAlert("Please provide valid email address"));
      return false;
    }
    //Check password strength
    else if (!checkPasswordStrength(password)) {
      $("#signup").prop('disabled', false);

      $('#message').html(prepareAlert("Password must alteast 6 character long and must contain at least 1 capital letter,\n\n1 small letter, 1 number and 1 special character.\n\nFor special characters you can pick one of these -,(,!,@,#,$,),%,<,>"));
      return false;
    }
    else if (password != repwd) {
      $("#signup").prop('disabled', false);

      $('#message').html(prepareAlert("Password does not match!"));
      return false;
    }
    else {
      let frm = $('#signup_form').val();
      let formData = new FormData(document.getElementById('signup_form'));
      $.ajax({
        type: "POST",
        url: "ajax/createuser.php",
        enctype: "multipart/form-data",
        dataType: "JSON",
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){  
          $("#signup").prop('disabled', false);

          if(data.success == 1 ) {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("#message").html(prepareAlert(data.message, 1));
            setTimeout(() => { window.location="login.php" }, 2000);
          }
          else {
            $("#signup").prop('disabled', false);
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("#message").html(prepareAlert(data.message));
          }
        },
        error: function()
        {
            $("#signup").prop('disabled', false);
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("#message").html(prepareAlert("Error Occured. Please try again"));
        },
        beforeSend:function()
        {
          $("#signup").prop('disabled', true);
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
        }
      });
    }
    return false;
  });
});

//Compare password
$('#retypepwd').blur(function () {
    if ($(this).val() == $('#password').val()) {
        $('#message').html('');
        return true;
    } else{
       $('#message').html(prepareAlert("Password does not match!"));
       return true;
  }
});

//Password strength check
$('#password').blur(function(){
  var password = $(this).val();

  if (checkPasswordStrength(password)) {
    $('#message').html('');
    return true;
  }
  else
  {
    $('#message').html(prepareAlert("Password must alteast 6 character long and must contain at least 1 capital letter,\n\n1 small letter, 1 number and 1 special character.\n\nFor special characters you can pick one of these -,(,!,@,#,$,),%,<,>"));
    return true;
  }

})


//Email format check
$('#email').blur(function(){
  var email = $(this).val();
  
  if (isEmail(email)) {
    $('#message').html('');
    return true;
  }
  else
  {
    $('#message').html(prepareAlert("Please provide valid email address"));
    return true;
  }

})

//Do not allow space in some fields
$('.no_space').keypress(function( e ) {
  console.log("Yes");
  if(e.which === 32) 
      return false;
})

//All functions

function checkPasswordStrength(password)
{
  var regex = new Array();
  regex.push("[A-Z]"); //Uppercase Alphabet.
  regex.push("[a-z]"); //Lowercase Alphabet.
  regex.push("[0-9]"); //Digit.
  regex.push("[!@#$%^&*]"); //Special Character.

  var passed = 0;
  for (var i = 0; i < regex.length; i++) {
      if (new RegExp(regex[i]).test(password)) {
          passed++;
      }
  }

  if (passed < 4 || password.length < 6) {
    return false;
  }
  else
  {
    return true;
  }
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function prepareAlert(message, success=0)
{
  alertType = (success == 1) ? "alert-success" : "alert-danger";

  return "<div class='alert "+alertType+" alert-dismissible'>\
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>\
  "+message+"</div>";
}
