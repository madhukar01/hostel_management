$("#remarks").hide();
$(document).ready(function(){
    var table_data = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">\
    <thead>\
      <tr>\
      <th>Date</th>\
        <th>Remarks</th>\
      </tr>\
    </thead>\
    <tbody>';
    $.get("../hostel/backend/return_remarks.php", function(data){
        if(data.length > 0)
        {
            $("#remarks").hide();
            for(i=0; i<data.length; ++i)
            {
                temp = data[i].split(",")
                if(temp[0] != "" && temp[1] != "")
                    table_data += "<tr><td>"+temp[0]+"</td><td>"+temp[1]+"</td></tr>";
            }
            table_data+= '</tbody></table>';
            $("#remarks_table").html(table_data);
        }
        else
            $("#remarks").show();
        });
});
