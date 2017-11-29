			function drawer(labell, dataa,dataa2){
				var ctx = document.getElementById('mychart').getContext('2d');
				var chart = new Chart(ctx, {
    			type: 'line',
    			data: {
        		labels: labell,
        		datasets: [{
            	label: "Year 1",
            	borderColor: 'rgb(255, 99, 132)',
            	data: dataa,
        		},
						{
            	label: "Year 2",
            	borderColor: 'rgba(100, 99, 132,.2)',
            	data: dataa2,
        		}]
    			},
					options: {}
				});
};
	function improver(improve,room,reduce,redroom){
		var d = document.getElementById('im');
		var h = document.createElement("h5");
		h.innerHTML = "These are the students whose grades improved and also share a common room in year 2";
		d.appendChild(h);
		var tab = document.createElement("table");
		tab.className = "table table-bordered";
		for(var i = 0 ; i < improve.length ; i++)
		{
				for(var j = i+1; j < improve.length ; j++)
				{
						if(room[j] == room[i]) 
						{
								var row = tab.insertRow(0);
								var cell1 = row.insertCell(0);
								var cell2 = row.insertCell(1);
								var cell3 = row.insertCell(2);
								cell1.innerHTML = improve[i];
								cell2.innerHTML = improve[j];
								cell3.innerHTML = room[j];
						}
				}
		}
		var head = tab.insertRow(0);
		var head1 = head.insertCell(0);
		var head2 = head.insertCell(1);
		var head3 = head.insertCell(2);
		head1.innerHTML = "USN 1";
		head2.innerHTML = "USN 2";
		head3.innerHTML = "Room";
		d.appendChild(tab);
		
		var h2 = document.createElement("h5");
		h2.innerHTML = "These are the students whose grades reduced and also share a common room in year 2";
		d.appendChild(h2);
		var tab2 = document.createElement("table");
		tab2.style.align = "centre";
		for(var i = 0 ; i < reduce.length ; i++)
		{
				for(var j = i+1; j < reduce.length ; j++)
				{
						if(redroom[j] == redroom[i]) 
						{
								var row2 = tab2.insertRow(0);
								var cell12 = row2.insertCell(0);
								var cell22 = row2.insertCell(1);
								var cell32 = row2.insertCell(2);

								cell12.innerHTML = reduce[i];
								cell22.innerHTML = reduce[j];
								cell32.innerHTML = redroom[j];
						}
				}
		}
		var head2 = tab2.insertRow(0);
		var head12 = head2.insertCell(0);
		var head22 = head2.insertCell(1);
		var head32 = head2.insertCell(2);
		head12.innerHTML = "USN 1";
		head22.innerHTML = "USN 2";
		head32.innerHTML = "Room";
		d.appendChild(tab2);
};