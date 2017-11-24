function hide_form()
{
    $("#roommate_form").hide();
    $("#new_block_button").hide();
    $("#mess_block_button").hide();
    $("#mm_block_button").hide();
    $("#booking_success").hide();
    $("#booking_failure").hide();
    $("#booking_error").hide();
    $("#room_booked").hide();
    $("#room_mate1").prop("disabled", true);
    $("#room_mate2").prop("disabled", true);
};

function hide_all()
{
    $("#room_mate").hide();
    $("#room_allotment").hide();
    $("#room_type_1").hide();
    $("#room_type_2").hide();
    hide_form();
};

hide_all();

function no_choice()
{
    $("#radio1").prop("checked");
    $("#room_mate1").prop("disabled", true);
    $("#room_mate2").prop("disabled", true);
    $("roommate_help1").html("");
    $("roommate_help2").html("");
}

function form_reset()
{
    no_choice();
    $("#new_block_button").hide();
    $("#mess_block_button").hide();
    $("#mm_block_button").hide();
    $("#roommate_help1").html("");
    $("#roommate_help2").html("");
    $("#roommate_form").trigger("reset");
};

function form_show($block)
{
    $("#room_mate").show();
    $("#roommate_form").show();
    form_reset()
    $($block).show();
};

function send_request(data)
{
    $.post("../hostel/backend/room_booking.php", data, function(status){
        hide_all();
    if(status == 0)
        $("#booking_failure").show();
    else if(status == 1)
        $("#booking_success").show();
    else
        $("#booking_error").show();
    });
};

function disable_buttons()
{
    $("#new_block_button").prop("disabled", true);
    $("#mess_block_button").prop("disabled", true);
    $("#mm_block_button").prop("disabled", true);
};

function enable_buttons()
{
    if($("#new_block_button").is(":visible"))
        $("#new_block_button").prop("disabled", false);
    else if($("#mess_block_button").is(":visible"))
        $("#mess_block_button").prop("disabled", false);
    else if($("#mm_block_button").is(":visible"))
        $("#mm_block_button").prop("disabled", false);
};

//Check if the user already has room allotted
$(document).ready(function(){
    $.get("../hostel/backend/checkroomallot.php", function(data){
       if(data == 1)
        $("#room_booked").show();
       else if(data == 0)
        $("#room_allotment").show();
    });
});

//Show fresher room blocks
$("#fresher_button").click(function(){
    $("#room_type_1").hide();
    $("#room_type_2").show();
    hide_form();
});

//Show hostelite room blocks
$("#hostelite_button").click(function(){
    $("#room_type_2").hide();
    $("#room_type_1").show();
});

$("#new_block").click(function(){
    form_show("#new_block_button");
});

$("#mm_block").click(function(){
    form_show("#mm_block_button");
});

$("#mess_block").click(function(){
    form_show("#mess_block_button");
});

$("#new_block_button").click(function(){

    if( $("#valid").attr('value')==1)
    {
        if($("#radio1").prop('checked'))
        {
            data = {block: "A"};
            send_request(data);
        }
        else
        {
            var usna =  $.trim( $("#room_mate1").val());
            var usnb =  $.trim( $("#room_mate2").val());
            if(usna != "" && usnb != "")
            {
                data = {block: "A", usn1 : usna, usn2 : usnb};
                send_request(data);
            }
        }
    }
});

$("#mess_block_button").click(function(){

    if( $("#valid").attr('value')==1)
    {
        if($("#radio1").prop('checked'))
        {
            data = {block: "B"};
            send_request(data);
        }
        else
        {
            var usna =  $.trim( $("#room_mate1").val());
            if(usna != "" )
            {
                data = {block: "B", usn1 : usna};
                send_request(data);
            }
        }
    }
});

$("#mm_block_button").click(function(){

    if( $("#valid").attr('value')==1)
    {
        if($("#radio1").prop('checked'))
        {
            data = {block: "C"};
            send_request(data);
        }
        else
        {
            var usna =  $.trim($("#room_mate1").val());
            if(usna != "")
            {   
                data = {block: "C", usn1 : usna};
                send_request(data);
            }
        }
    }
});

$("#ih_block_button").click(function(){
    hide_form();
    data = {block: "D"};
    send_request(data);
});

$("#nbx_block_button").click(function(){
    hide_form();
    data = {block: "E"};
    send_request(data);
});

$("#it_block_button").click(function(){
    hide_form();
    data = {block: "F"};
    send_request(data);
});


$('input[name="choice_type"]').change(function(){
    if($("#radio1").prop('checked')){
        no_choice();
    }
    else if($("#radio2").prop('checked')) {
        $("#valid").val(0);
        $("#room_mate1").prop("disabled", false);
        if($("#new_block_button").is(":visible"))
            $("#room_mate2").prop("disabled", false);
    }
});

$("#room_mate1").focusout(function() {
    var text =  $.trim( $("#room_mate1").val());
    if(text != "")
    {
        $.get("../hostel/backend/bookRoom.php?usn1="+text, function(data) {
            //alert("Data: " + data );
            if(data == 0) 
            {
                $("#roommate_help1").html("<font color='red'>Invalid USN entered, Try again !</font>");
                $("#valid").val(0);
            }
            else if(data == 1) 
            {
                $("#roommate_help1").html("<font color='blue'>USN Found, Please proceed !</font>");
                $("#valid").val(1);
            }
            else if(data == 2)
            {
                $("#roommate_help1").html("<font color='red'>USN already has a room allotted to him ,please choose a different student !</font>");
                $("#valid").val(0);
            }
        });
    }   
});

$("#room_mate2").focusout(function() {
    var text =  $.trim( $("#room_mate2").val());
    if(text != "")
    {
        $.get("../hostel/backend/bookRoom.php?usn1="+text, function(data) {
            //alert("Data: " + data );
            if(data == 0) 
            {
                $("#roommate_help2").html("<font color='red'>Invalid USN entered, Try again !</font>");
                $("#valid").val(0);
            }
            else if(data == 1) 
            {
                $("#roommate_help2").html("<font color='blue'>USN Found, Proceed to book your room!</font>");
                $("#valid").val(1);
            }
            else if(data == 2)
            {
                $("#roommate_help2").html("<font color='red'>USN already has a room allotted to him ,please choose a different student !</font>");
                $("#valid").val(0);
            }
        });
    }   
});