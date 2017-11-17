$("#password").prop("disabled", true);
$("#username").focusout(function() {
    var text =  $.trim( $("#username").val());
    if(text != "")
    {
        $.get("../hostel/backend/usn_exists.php?usn="+text, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usernameHelp").html("<font color='blue'>User found, Please enter password to login !</font>");
                $("#submit_button").prop("disabled", false);
                $("#password").prop("disabled", false);
            }
            else
            {
                $("#usernameHelp").html("<font color='red'>User not found, Please register to proceed !</font>");
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
            $("#loginHelp").html("<font color='green'>Login Successful !</font>");
            setTimeout(function() {
                window.location.href = "dashboard.php";
              }, 1000);
            //alert("Login done");
        }
        else if(data == 1)
        {
            $("#loginHelp").html("<font color='red'>Wrong password entered ! Please try again.</font>");
            //alert("Wrong password");
        } 
    });
});

$('#login_form').bind('submit',function() {
    return false;
 });