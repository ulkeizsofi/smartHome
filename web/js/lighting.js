$(function(){
	$("#add-button").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var switch_name = prompt("Please enter the name of the room:","RoomName1");
	if (switch_name != null){

		sendToDB(switch_name);
		
	}
	});
});

function sendToDB(switch_name){

	var data = {'name': switch_name};
	
	$.ajax({
		type: "POST",
		url:"/api/lighting.php",
		data: data,
    	success:function(response){
    	// 	$data = JSON.parse(response);
    	// 	if (data["status"] == "success"){

    			createSwitch(switch_name, false);
    		// }
    		// else{
    		// 	alert("Cannot add switch\n" + data['reason']);
    		// }
    	}
    }
	);
}

function createSwitch(switch_name, value){

		var div = document.createElement("DIV");
		div.type = "switch";

		var head1 = document.createElement("H1");
		head1.innerHTML = switch_name;

		var lab = document.createElement("LABEL");
		lab.className="switch";
		lab.id = "lighting";

		var inp = document.createElement("INPUT");
		inp.type="checkbox";
		inp.onchange= switchChange;
		
		inp.id = switch_name;
		inp.checked = value;

		var toggle = document.createElement("DIV");
		toggle.className="slider round";

		lab.appendChild(inp);
		lab.appendChild(toggle);
		div.appendChild(head1);
		div.appendChild(lab);


		document.getElementById("switch_area").appendChild(div);

}


function switchChange(){
        var id = $(this).attr("id");
        var state = this.checked;
        var obj = {'name': id,'state':state };
         $.ajax({
            type: "POST",
            url: "/api/lighting.php",
            data: obj,
            success: function(data) {

            var response = JSON.parse(data);

            if(response["status"] == "success") {
               //alert(response["status"]);           
            }
            else {
                alert(response["reason"]);
            }
        }
    });
}

function loadLighting(){
		var ids = ["lighting_tb","*"];
		var val;
        var jsonArr = JSON.stringify(ids);
            $.ajax({
            type: "POST",
            url: "/api/refresh.php",
            data: {data:jsonArr},
            success: function(data) {

            var response = JSON.parse(data);

            if(response["status"] == "success") {
                $.each(response, function(key, value){
                	if (key != "status"){
                		val = value == "1" ? true : false;
                   		createSwitch(key, val);
                	}
                });
            }
            else {
                alert(response["reason"]);
            }
          }
      });
	}