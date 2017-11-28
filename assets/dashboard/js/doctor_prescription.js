$("#prescription").hide();
$(document).ready(function(){
    var table_data = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">\
    <thead>\
      <tr>\
      <b>\
      <th>Date</th>\
        <th>Prescription</th>\
        </b>\
      </tr>\
    </thead>\
    <tbody>';
    $.get("../hostel/backend/return_prescription.php", function(data){
       if(data.length > 0)
       {
            $("#prescription").hide();
            for(i=0; i<data.length; ++i)
            {
                temp = data[i].split(",")
                if(temp[0] != "" && temp[1] != "")
                    table_data += "<tr><td>"+temp[0]+"</td><td>"+temp[1]+"</td></tr>";
            }
            table_data+= '</tbody></table>';
            $("#prescription_table").html(table_data);
        }
       else
        $("#prescription").show();
    });
});
