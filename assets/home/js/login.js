$("#password").prop("disabled", true);
$("#username").focusout(function() {
    var text =  $.trim( $("#username").val());
    var user = $('input[name=user_type]:checked', '#user_radio').val();
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php?usn", {usn: text, user_type: user}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usernameHelp").html("<strong>User found, Please enter password to login !</strong>");
                $("#submit_button").prop("disabled", false);
                $("#password").prop("disabled", false);
            }
            else
            {
                $("#usernameHelp").html("<strong>User not found, Please register to proceed !</strong>");
                $("#submit_button").prop("disabled", true);
                $("#password").prop("disabled", true);
            }
        });
    }   
});

$("#submit_button").click(function(){
    $.post("../hostel/backend/validate_login.php", $('#login_form').serialize(), function(data){
        if(data == 0)
        {
            $("#loginHelp").html("<strong>Login Successful !</strong>");
            setTimeout(function() {
                window.location.href = "dashboard.php";
              }, 1000);
            //alert("Login done");
        }
        else if(data == 1)
        {
            $("#loginHelp").html("<strong>Wrong password entered ! Please try again.</strong>");
            //alert("Wrong password");
        } 
    });
});

$('#login_form').bind('submit',function() {
    return false;
 }); 