function hide_form()
{
    $("#add_staff_form").hide();
    $("#delete_staff_form").hide();
    $("#add_doctor_form").hide();
    $("#delete_doctor_form").hide();
    $("#add_mess_form").hide();
    $("#delete_mess_form").hide();
    $("#doctor_password").prop("disabled", true);
    $("#staff_password").prop("disabled", true);
    $("#submit_success").hide();
    $("#submit_failure").hide();
    $("#submit_duplicate").hide();   
};

function hide_all()
{
    hide_form();
    $("#admin_buttons").hide();
};
hide_form();

function form_reset()
{
    $("#add_staff_form").trigger("reset");
    $("#delete_staff_form").trigger("reset");
    $("#add_doctor_form").trigger("reset");
    $("#delete_doctor_form").trigger("reset");
    $("#add_mess_form").trigger("reset");
    $("#delete_mess_form").trigger("reset");
    $("#usnHelp1").html("");
    $("#usnHelp2").html("");
    $("#usnHelp3").html("");
    $("#usnHelp4").html("");
    $("#usnHelp5").html(""); 
    $("#usnHelp6").html("");    
};

function disable_buttons()
{
    $("#submit_button1").prop("disabled", true);
    $("#submit_button2").prop("disabled", true);
    $("#submit_button3").prop("disabled", true);
    $("#submit_button4").prop("disabled", true);
    $("#submit_button5").prop("disabled", true);
    $("#submit_button6").prop("disabled", true);
};

function form_show($block)
{
    hide_form();
    form_reset();
    $($block).show();
};

$("#add_staff_button").click(function(){
    form_show("#add_staff_form");
});

$("#add_doctor_button").click(function(){
    form_show("#add_doctor_form");
});

$("#add_mess_button").click(function(){
    form_show("#add_mess_form");
});

$("#delete_staff_button").click(function(){
    form_show("#delete_staff_form");
});

$("#delete_doctor_button").click(function(){
    form_show("#delete_doctor_form");
});

$("#delete_mess_button").click(function(){
    form_show("#delete_mess_form");
});


$("#student_usn1").focusout(function() {
    var text =  $.trim( $("#student_usn1").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "student"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp1").html("<font color='blue'>Student found, Please proceed !</font>");
                $("#submit_button1").prop("disabled", false);
                $("#remarks").prop("disabled", false);
            }
            else
            {
                $("#usnHelp1").html("<font color='red'>Student not found, Enter another USN !</font>");
                $("#submit_button1").prop("disabled", true);
                $("#remarks").prop("disabled", true);
            }
        });
    }   
});

$("#student_usn2").focusout(function() {
    var text =  $.trim( $("#student_usn2").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "student"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp2").html("<font color='blue'>Student found, Please proceed !</font>");
                $("#submit_button2").prop("disabled", false);
            }
            else
            {
                $("#usnHelp2").html("<font color='red'>Student not found, Enter another USN !</font>");
                $("#submit_button2").prop("disabled", true);
            }
        });
    }   
});

$("#submit_button1").click(function(){
    var usna =  $.trim( $("#student_usn1").val());
    var desc =  $.trim( $("#remarks").val());
    if(desc != "" && usna != "")
    {
        $.post("../hostel/backend/remarks.php", {usn: usna, msg: desc}, function(status) {
            $("#staff_buttons").hide();
            $("#attendance_form").hide();
            $("#remarks_form").hide();
            $("#announcement_form").hide();
            //alert("Data: " + data );
            if(status == 1) 
            {
                $("#submit_success").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
            else
            {
                $("#submit_failure").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
        });
    }   
});

$("#submit_button2").click(function(){
    var usna =  $.trim( $("#student_usn2").val());
    var d = getdate(); 
    if(d != "" && usna != "")
    {
        $.post("../hostel/backend/date.php", {usn: usna, day: d}, function(status) {
            $("#staff_buttons").hide();   
            $("#attendance_form").hide();
            $("#remarks_form").hide();  
            $("#announcement_form").hide();  
            //alert("Data: " + data );
            if(status == 1) 
            {
                $("#submit_success").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
            else if(status == 0)
            {
                $("#submit_duplicate").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
            else
            {
                $("#submit_failure").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
        });
    }   
});

$("#submit_button3").click(function(){
    var d = getdate(); 
    var desc =  $.trim( $("#announcement").val());
    if(desc != "" && d != "")
    {
        $.post("../hostel/backend/remarks.php", {day: d, msg: announcement}, function(status) {
            $("#staff_buttons").hide();
            $("#attendance_form").hide();
            $("#remarks_form").hide();
            $("#announcement_form").hide();
            //alert("Data: " + data );
            if(status == 1) 
            {
                $("#submit_success").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
            else
            {
                $("#submit_failure").show();
                setTimeout(function(){
                    window.location.reload(1);
                 }, 5000);
            }
        });
    }   
});