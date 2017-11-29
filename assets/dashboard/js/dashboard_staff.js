function getdate()
{
    var m_names = new Array("Jan", "Feb", "Mar", 
    "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
    "Oct", "Nov", "Dec");
    
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();
    return curr_date + "-" + m_names[curr_month] + "-" + curr_year;
};

function hide_form()
{
    $("#attendance_form").hide();
    $("#remarks_form").hide();
    $("#announcement_form").hide();
    $("#remarks").prop("disabled", true);
    $("#submit_success").hide();
    $("#submit_failure").hide();
    $("#submit_duplicate").hide();
};
hide_form();

function disable_buttons()
{
    $("#submit_button1").prop("disabled", true);
    $("#submit_button2").prop("disabled", true);  
};
disable_buttons();

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

function reset_form()
{
    $("#remarks_form").trigger("reset");
    $("#attendance_form").trigger("reset");
    $("#announcement_form").trigger("reset");
    $("#usnHelp1").html("");
    $("#usnHelp2").html("");
};

function blur_div()
{
    $("#card1").css("opacity", "0.25");
    $("#card2").css("opacity", "0.25");
    $("#card3").css("opacity", "0.25");
};

$("#attendance_button").click(function(){
   
    reset_form();
    blur_div();
    $("#card1").css("opacity", "1");
    $("#attendance_form").show();
    $("#remarks_form").hide();
    $("#announcement_form").hide();
    $("#submit_success").hide();
    $("#submit_failure").hide();
    $("#submit_duplicate").hide();
    });

$("#remarks_button").click(function(){
    blur_div();
    $("#card2").css("opacity", "1");
    $("#attendance_form").hide();
    $("#remarks_form").show();
    $("#announcement_form").hide();
    $("#submit_success").hide();
    $("#submit_failure").hide();
    $("#submit_duplicate").hide();
    });

$("#announcement_button").click(function(){
    blur_div();
    $("#card3").css("opacity", "1");
    $("#attendance_form").hide();
    $("#remarks_form").hide();
    $("#announcement_form").show();
    $("#submit_success").hide();
    $("#submit_failure").hide();
    $("#submit_duplicate").hide();
    });

$("#submit_button1").click(function(){
    var usna =  $.trim( $("#student_usn1").val());
    var desc =  $.trim( $("#remarks").val());
    var d = getdate();
    if(desc != "" && usna != "" && d != "")
    {
        $.post("../hostel/backend/remarks.php", {usn: usna, msg: desc, day: d}, function(status) {
            $("#staff_buttons").hide();
            hide_form();
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
    else
    {
        $("#submit_failure").show();
        setTimeout(function(){
            window.location.reload(1);
         }, 5000);
    }   
});

$("#submit_button2").click(function(){
    var usna =  $.trim( $("#student_usn2").val());
    var d = getdate(); 
    if(d != "" && usna != "")
    {
        $.post("../hostel/backend/date.php", {usn: usna, day: d}, function(status) {
            $("#staff_buttons").hide();   
            hide_form(); 
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
    else
    {
        $("#submit_failure").show();
        setTimeout(function(){
            window.location.reload(1);
         }, 5000);
    }   
});

$("#submit_button3").click(function(){
    var d = getdate(); 
    var desc =  $.trim( $("#announcement").val());
    if(desc != "" && d != "")
    {
        $.post("../hostel/backend/announcement.php", {day: d, msg: desc}, function(status) {
            $("#staff_buttons").hide();
            hide_form();
            //alert("Data: " + data );
            if(status == 0) 
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
    else
    {
        $("#submit_failure").show();
        setTimeout(function(){
            window.location.reload(1);
         }, 5000);
    }   
});