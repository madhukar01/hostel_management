$("#failure").hide();
$(document).ready(function(){
    var table_data = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">\
    <thead>\
      <tr>\
      <b>\
        <th>Date</th>\
        <th>Attendance</th>\
        </b>\
      </tr>\
    </thead>\
    <tbody>';
    $.get("../hostel/backend/return_attendance.php", function(data){
       if(data.length > 0)
       {
            $("#failure").hide();
            for(i=0; i<data.length; ++i)
            {
                if(data[i] != "")
                    table_data += "<tr><td>"+data[i]+"</td><td>Present</td></tr>";
            }
            table_data+= '</tbody></table>';
            $("#attendance_table").html(table_data);
        }
       else
        $("#failure").show();
    });
});
