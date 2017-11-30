function hide_form()
{
    $("#add_staff_form").hide();
    $("#delete_staff_form").hide();
    $("#add_doctor_form").hide();
    $("#delete_doctor_form").hide();
    $("#add_mess_form").hide();
    $("#delete_mess_form").hide();
    $("#add_coun_form").hide();
    $("#delete_coun_form").hide();
    $("#doctor_password").prop("disabled", true);
    $("#staff_password").prop("disabled", true);
    $("#coun_password").prop("disabled", true);
    $("#mess_coupon").prop("disabled", true);
    $("#submit_success").hide();
    $("#submit_failure").hide();
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
    $("#add_coun_form").trigger("reset");
    $("#delete_coun_form").trigger("reset");
    $("#usnHelp1").html("");
    $("#usnHelp2").html("");
    $("#usnHelp3").html("");
    $("#usnHelp4").html("");
    $("#usnHelp5").html(""); 
    $("#usnHelp6").html("");
    $("#usnHelp7").html(""); 
    $("#usnHelp8").html("");   
    $("#data_table").html("");  
};

function disable_buttons()
{
    $("#submit_button1").prop("disabled", true);
    $("#submit_button2").prop("disabled", true);
    $("#submit_button3").prop("disabled", true);
    $("#submit_button4").prop("disabled", true);
    $("#submit_button5").prop("disabled", true);
    $("#submit_button6").prop("disabled", true);
    $("#submit_button7").prop("disabled", true);
    $("#submit_button8").prop("disabled", true);
};

function blur_div()
{
    $("#card1").css("opacity", "0.25");
    $("#card2").css("opacity", "0.25");
    $("#card3").css("opacity", "0.25");
    $("#card4").css("opacity", "0.25");
    $("#card5").css("opacity", "0.25");
    $("#card6").css("opacity", "0.25");
    $("#card7").css("opacity", "0.25");
    $("#card8").css("opacity", "0.25");
};

function form_show($block)
{
    blur_div();
    hide_form();
    form_reset();
    $($block).show();
};


function load_table($t)
{
    $("#data_table").html("");
    $.post("../hostel/backend/return_admin_data.php",{type: $t}, function(data){
        temp = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">\
        <thead>\
          <tr>\
          <b>\
            <th>ID</th>\
            <th>State</th>\
            </b>\
          </tr>\
        </thead>\
        <tbody>';
        if(data.length > 0)
        {
             for(i=0; i<data.length; ++i)
             {
                 if(data[i] != "")
                    temp += "<tr><td>"+data[i]+"</td><td>Active</td></tr>";
             }
             temp += '</tbody></table>';
             $("#data_table").html(temp);
         }  
        else
         {
             temp +="<tr><td>No data available</td></tr>";
             temp += '</tbody></table>';
             $("#data_table").html(temp);
         }
     });
};

$("#add_staff_button").click(function(){
    form_show("#add_staff_form");
    $("#card1").css("opacity", "1");
});

$("#add_doctor_button").click(function(){
    form_show("#add_doctor_form");
    $("#card2").css("opacity", "1");
});

$("#add_mess_button").click(function(){
    form_show("#add_mess_form");
    $("#card3").css("opacity", "1");
});

$("#add_coun_button").click(function(){
    form_show("#add_coun_form");
    $("#card7").css("opacity", "1");
});

$("#delete_staff_button").click(function(){
    form_show("#delete_staff_form");
    load_table("staff");
    $("#card4").css("opacity", "1");
});

$("#delete_doctor_button").click(function(){
    form_show("#delete_doctor_form");
    load_table("doctor");
    $("#card5").css("opacity", "1");
});

$("#delete_mess_button").click(function(){
    form_show("#delete_mess_form");
    load_table("mess");
    $("#card6").css("opacity", "1");
});

$("#delete_coun_button").click(function(){
    form_show("#delete_coun_form");
    load_table("counsellor");
    $("#card8").css("opacity", "1");
});

$("#staff_usn1").focusout(function() {
    var text =  $.trim( $("#staff_usn1").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "staff"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp1").html("<font color='red'>Staff ID already found, choose a different ID !</font>");
                $("#submit_button1").prop("disabled", true);
                $("#staff_password").prop("disabled", true);
            }
            else
            {
                $("#usnHelp1").html("<font color='blue'>Staff ID is unique, Enter password to proceed !</font>");
                $("#submit_button1").prop("disabled", false);
                $("#staff_password").prop("disabled", false);
            }
        });
    }   
});

$("#staff_usn2").focusout(function() {
    var text =  $.trim( $("#staff_usn2").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "staff"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp2").html("<font color='blue'>Staff ID found, Please proceed to delete!</font>");
                $("#submit_button2").show();
            }
            else
            {
                $("#usnHelp2").html("<font color='red'>Staff ID not found, choose a different ID !</font>");
                $("#submit_button2").hide();
            }
        });
    }   
});

$("#doctor_usn1").focusout(function() {
    var text =  $.trim( $("#doctor_usn1").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "doctor"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp3").html("<font color='red'>Doctor ID already found, choose a different ID !</font>");
                $("#submit_button3").prop("disabled", true);
                $("#doctor_password").prop("disabled", true);
            }
            else
            {
                $("#usnHelp3").html("<font color='blue'>Doctor ID is unique, Enter password to proceed !</font>");
                $("#submit_button3").prop("disabled", false);
                $("#doctor_password").prop("disabled", false);
            }
        });
    }   
});

$("#doctor_usn2").focusout(function() {
    var text =  $.trim( $("#doctor_usn2").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "doctor"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp4").html("<font color='blue'>Doctor ID found, Please proceed to delete!</font>");
                $("#submit_button4").show();
            }
            else
            {
                $("#usnHelp4").html("<font color='red'>Doctor ID not found, choose a different ID !</font>");
                $("#submit_button4").hide();
            }
        });
    }   
});

$("#coun_usn1").focusout(function() {
    var text =  $.trim( $("#coun_usn1").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "counsellor"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp7").html("<font color='red'>Counsellor ID already found, choose a different ID !</font>");
                $("#submit_button7").prop("disabled", true);
                $("#coun_password").prop("disabled", true);
            }
            else
            {
                $("#usnHelp7").html("<font color='blue'>Counsellor ID is unique, Enter password to proceed !</font>");
                $("#submit_button7").prop("disabled", false);
                $("#coun_password").prop("disabled", false);
            }
        });
    }   
});

$("#coun_usn2").focusout(function() {
    var text =  $.trim( $("#coun_usn2").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "counsellor"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp8").html("<font color='blue'>Counsellor ID found, Please proceed to delete!</font>");
                $("#submit_button8").show();
            }
            else
            {
                $("#usnHelp8").html("<font color='red'>Counsellor ID not found, choose a different ID !</font>");
                $("#submit_button8").hide();
            }
        });
    }   
});

$("#mess_name1").focusout(function() {
    var text =  $.trim( $("#mess_name1").val());
    if(text != "")
    {
        $.post("../hostel/backend/check_mess.php", {name: text}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp5").html("<font color='red'>Mess Name already found, choose a different Name !</font>");
                $("#submit_button5").prop("disabled", true);
                $("#mess_coupon").prop("disabled", true);
            }
            else
            {
                $("#usnHelp5").html("<font color='blue'>Mess Name is unique, Enter coupons to proceed !</font>");
                $("#submit_button5").prop("disabled", false);
                $("#mess_coupon").prop("disabled", false);
            }
        });
    }   
});

$("#mess_name2").focusout(function() {
    var text =  $.trim( $("#mess_name2").val());
    if(text != "")
    {
        $.post("../hostel/backend/check_mess.php", {name: text}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp6").html("<font color='blue'>Mess Name found, Please proceed to delete!</font>");
                $("#submit_button6").show();
            }
            else
            {
                $("#usnHelp6").html("<font color='red'>Mess Name not found, choose a different mess !</font>");
                $("#submit_button6").hide();
            }
        });
    }   
});

$("#submit_button1").click(function(){
    var usna =  $.trim( $("#staff_usn1").val());
    var pwd =  $.trim( $("#staff_password").val());
    if(pwd != "" && usna != "")
    {
        $.post("../hostel/backend/insert_staff.php", {id: usna, paswd: pwd}, function(status) {
            hide_all();
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
    var usna =  $.trim( $("#staff_usn2").val());
    if(usna != "")
    {
        $.post("../hostel/backend/delete_staff.php", {id: usna}, function(status) {
            hide_all();
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

$("#submit_button3").click(function(){
    var usna =  $.trim( $("#doctor_usn1").val());
    var pwd =  $.trim( $("#doctor_password").val());
    if(pwd != "" && usna != "")
    {
        $.post("../hostel/backend/insert_doctor.php", {id: usna, paswd: pwd}, function(status) {
            hide_all();
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

$("#submit_button4").click(function(){
    var usna =  $.trim( $("#doctor_usn2").val());
    if(usna != "")
    {
        $.post("../hostel/backend/delete_doctor.php", {id: usna}, function(status) {
            hide_all();
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

$("#submit_button5").click(function(){
    var usna =  $.trim( $("#mess_name1").val());
    var pwd =  $.trim( $("#mess_coupon").val());
    if(pwd != "" && usna != "")
    {
        $.post("../hostel/backend/insert_mess.php", {name: usna, coupon: pwd}, function(status) {
            hide_all();
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

$("#submit_button6").click(function(){
    var usna =  $.trim( $("#mess_name2").val());
    if(usna != "")
    {
        $.post("../hostel/backend/delete_mess.php", {name: usna}, function(status) {
            hide_all();
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

$("#submit_button7").click(function(){
    var usna =  $.trim( $("#coun_usn1").val());
    var pwd =  $.trim( $("#coun_password").val());
    if(pwd != "" && usna != "")
    {
        $.post("../hostel/backend/insert_counsellor.php", {id: usna, paswd: pwd}, function(status) {
            hide_all();
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

$("#submit_button8").click(function(){
    var usna =  $.trim( $("#coun_usn2").val());
    if(usna != "")
    {
        $.post("../hostel/backend/delete_counsellor.php", {id: usna}, function(status) {
            hide_all();
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