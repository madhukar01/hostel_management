$("#food_allotment").hide();
$(document).ready(function(){
    $.get("../hostel/backend/checkcouponallot.php", function(data){
       if(data == 1)
        $("#food_booked").show();
       else if(data == 0)
        $("#food_allotment").show();
    });
});

$("#booking_success").hide();
$("#booking_failure").hide();
$("#food_booked").hide();
$("#food_error").hide();
$("#food_court_button").click(function(){
    $.post("../hostel/backend/allotCoupon.php", {food: 1}, function(data){
        $("#food_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();     
           else
           $("#food_error").show();
    });
});

$("#hostel_mess_button").click(function(){
    $.post("../hostel/backend/allotCoupon.php", {food: 2}, function(data){
        $("#food_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
           else
           $("#food_error").show();
    });
});

$("#aman_rasoi_button").click(function(){
    $.post("../hostel/backend/allotCoupon.php", {food: 3}, function(data){
        $("#food_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();
           else
           $("#food_error").show();
    });
});