$("#submit_success").hide();
$("#submit_failure").hide();

$("#submit_button").click(function(){
    var desc =  $.trim( $("#counsel").val());
    if(desc != "")
    {
        $.post("../hostel/backend/insert_counsellormsg.php", {msg: desc}, function(status) {
            //alert("Data: " + data );
            $("#description_form").hide();
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