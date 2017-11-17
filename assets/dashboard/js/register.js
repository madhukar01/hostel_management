$("#student_usn, #radio5, #radio6, #radio7, #radio8").prop("disabled", true);
$("#radio1").click(function() {
                                $("#student_adm, #radio3, #radio4").prop("disabled", false);
                                $("#student_usn, #radio5, #radio6, #radio7, #radio8").prop("disabled", true); 
                                $("#radio3").prop("checked", true);
                                $("#bill_amount").html("₹ 1,25,000");                               
                              });
$("#radio2").click(function() {
                                $("#student_usn, #radio5, #radio6, #radio7, #radio8").prop("disabled", false);
                                $("#student_adm, #radio3, #radio4").prop("disabled", true);
                                $("#radio6").prop("checked", true);
                                $("#bill_amount").html("₹ 1,25,000");
                              });
$("#radio3, #radio6, #radio7").click(function() {
                                $("#bill_amount").html("₹ 1,25,000");
                              });
$("#radio4, #radio5, #radio8").click(function() {
                                $("#bill_amount").html("₹ 1,35,000");
                              });

//Checking if usn exists
$("#student_adm").focusout(function() {
                                var text =  $.trim( $("#student_adm").val());
                                if(text != "")
                                {
                                    $.get("../hostel/backend/usn_exists.php?usn="+text, function(data) {
                                        //alert("Data: " + data );
                                        if(data == 1)
                                        { 
                                            $("#usernameHelp").html("<font color='red'>Username already exist</font>");
                                            alert("USN already exist !");
                                            $("#submit_button").prop("disabled", true);
                                        }
                                        else
                                        {
                                            $("#usernameHelp").html("<font color='blue'>Proceed with application</font>");
                                            $("#submit_button").prop("disabled", false);
                                        }
                                    });
                                }   
});
$("#student_usn").focusout(function() {
    var text =  $.trim( $("#student_usn").val());
    if(text != "")
    {
        $.get("../hostel/backend/usn_exists.php?usn="+text, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usernameHelp").html("<font color='red'>Username already exist</font>");
                alert("USN already exist !");
                $("#submit_button").prop("disabled", true);
            }
            else
            {
                $("#usernameHelp").html("<font color='blue'>Proceed with application</font>");
                $("#submit_button").prop("disabled", false);
            }
        });
    }   
});

