$("#remarks").hide();
$(document).ready(function(){
    $.get("../hostel/backend/checkcouponallot.php", function(data){
        var table_data = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">\
        <thead>\
          <tr>\
            <th>Staff ID</th>\
            <th>Remarks</th>\
          </tr>\
        </thead>\
        <tbody>';
       if(data)
       {
            $("#remarks").hide();
            table_data += "";
            table_data+= '</tbody></table>';
        }
       else
        $("#remarks").show();
    });
});
