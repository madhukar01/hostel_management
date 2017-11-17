$("#room_allotment").hide();
$(document).ready(function(){
    $.get("../hostel/backend/checkroomallot.php", function(data){
       if(data == 1)
        $("#room_booked").show();
       else if(data == 0)
        $("#room_allotment").show();
    });
});


$("#room_type_1").hide();
$("#room_type_2").hide();
$("#booking_success").hide();
$("#booking_failure").hide();
$("#room_booked").hide();
$("#booking_error").hide();

$("#fresher_button").click(function(){
    $("#room_type_1").hide();
    $("#room_type_2").show();
});

$("#hostelite_button").click(function(){
    $("#room_type_2").hide();
    $("#room_type_1").show();
});

$("#new_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "A"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
       else
           $("#booking_error").show();
    });
});

$("#mess_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "B"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
           else
           $("#booking_error").show();
    });
});

$("#mm_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "C"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();  
           else
           $("#booking_error").show();
    });
});

$("#ih_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "D"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
           else
           $("#booking_error").show();
    });
});

$("#nbx_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "E"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
           else
           $("#booking_error").show();
    });
});

$("#it_block_button").click(function(){
    $.post("../hostel/backend/book_room.php", {block: "F"}, function(data){
        $("#room_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();  
           else
           $("#booking_error").show();
    });
});