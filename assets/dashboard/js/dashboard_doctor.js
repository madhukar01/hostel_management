$("#submit_button").prop("disabled", true);
$("#prescription").prop("disabled", true);
$("#submit_success").hide();
$("#submit_failure").hide();
$("#student_usn").focusout(function() {
    var text =  $.trim( $("#student_usn").val());
    if(text != "")
    {
        $.post("../hostel/backend/usn_exists.php", {usn: text, user_type: "student"}, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp").html("<font color='blue'>Student found, Please enter prescription and submit !</font>");
                $("#submit_button").prop("disabled", false);
                $("#prescription").prop("disabled", false);
            }
            else
            {
                $("#usnHelp").html("<font color='red'>Student not found, Enter another USN !</font>");
                $("#submit_button").prop("disabled", true);
                $("#prescription").prop("disabled", true);
            }
        });
    }   
});

$("#submit_button").click(function(){
    var usna =  $.trim( $("#student_usn").val());
    var desc =  $.trim( $("#prescription").val());
    if(desc != "" && usna != "")
    {
        $.post("../hostel/backend/prescription.php", {usn: usna, prescription: desc}, function(status) {
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
});