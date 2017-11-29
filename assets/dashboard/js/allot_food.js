
div_start='<div class="col-xl-3 col-sm-6 mb-5">\
            <div class="card text-white bg-danger o-hidden h-100">\
            <div class="card-body">\
            <div class="card-body-icon">\
            <i class="fa fa-fw fa-cutlery"></i>\
            </div>\
            <div class="mr-5">';
div_mid='</div></div><a href="#" class="card-footer text-white clearfix small z-1" onclick="';
div_end='"><span class="float-left">Book Now</span>\
            <span class="float-right">\
            <i class="fa fa-angle-right"></i>\
            </span></a></div></div>';

function load_mess()
{
    $.post("../hostel/backend/get_mess.php", function(data){
        if(data.length > 0)
        {
            buttons = "";
            for(i=0; i<data.length; ++i)
                buttons += div_start + data[i] + div_mid + "food_booking('" + data[i] + "')" + div_end;
            $("#mess_type").html(buttons);
        };
    });
}


$("#food_allotment").hide();
$(document).ready(function(){
    $.get("../hostel/backend/checkcouponallot.php", function(data){
       if(data == 1)
        $("#food_booked").show();
       else if(data == 0)
       {
        $("#food_allotment").show();
        load_mess();
        }
    });
});

$("#booking_success").hide();
$("#booking_failure").hide();
$("#food_booked").hide();
$("#food_error").hide();


function food_booking(mess)
{
    $.post("../hostel/backend/allotCoupon.php", {food: mess}, function(data){
        $("#food_allotment").hide();
       if(data == 0)
           $("#booking_failure").show();
       else if(data == 1)
           $("#booking_success").show();     
           else
           $("#food_error").show();
    });
};

/*  
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

<div class="col-xl-3 col-sm-6 mb-5">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5">Food Court</div>
            </div>
            <a id="food_court_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-spoon"></i>
                </div>
                <div class="mr-5">Hostel Mess</div>
              </div>
              <a id="hostel_mess_button" class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Book Now</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-lemon-o"></i>
              </div>
              <div class="mr-5">Aman Rasoi</div>
            </div>
            <a id="aman_rasoi_button" class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Book Now</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>*/