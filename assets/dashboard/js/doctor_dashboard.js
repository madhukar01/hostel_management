$("#submit_button").prop("disabled", true);
$("#prescription").prop("disabled", true);
$("#submit_success").hide()
$("#submit_failure").hide()
$("#student_usn").focusout(function() {
    var text =  $.trim( $("#student_usn").val());
    if(text != "")
    {
        $.get("../hostel/backend/usn_exists.php?usn="+text, function(data) {
            //alert("Data: " + data );
            if(data == 1) 
            {
                $("#usnHelp").html("<font color='blue'>Student found, Please enter prescription and submit !</font>");
                $("#submit_button").prop("disabled", false);
                $("#password").prop("disabled", false);

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
    if(desc != "" && usn != "")
    {
        $.post("../hostel/backend/doctor_description.php", {usn: usna, description: desc}, function(status) {
            //alert("Data: " + data );
            if(status == 1) 
            {
                $("#submit_success").show();
            }
            else
            {
                $("#submit_failure").show();
            }
        });
    }   
});