$(function(){
	$("#add-button").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var switch_name = prompt("Please enter the name of the room:","RoomName1");
		if (switch_name != null){

		sendToDB(switch_name);

		var div = document.createElement("DIV");
		div.type = "switch";

		var head1 = document.createElement("H1");
		head1.innerHTML = switch_name;

		var lab = document.createElement("LABEL");
		lab.className="switch";

		var inp = document.createElement("INPUT");
		inp.type="checkbox";

		var toggle = document.createElement("DIV");
		toggle.className="slider round";

		lab.appendChild(inp);
		lab.appendChild(toggle);
		div.appendChild(head1);
		div.appendChild(lab);

		document.getElementById("switch_area").appendChild(div);
		console.log(document.getElementById("switch_area"));
	}
	});
});

function sendToDB(name){
	var data = "{'name':'RoomName1'}";
	
	console.log(data);
	$.ajax({
		type: "POST",
		url:"/api/lighting.php",
		data: data,
    	success:function(data){
    		alert(data);
    	}
    }
	);
}


// $(function(){
//     $(".switch").click(function(e){
//         var id = this.childNodes[1].id;
//         var state = document.getElementById(id).checked;
//         //console.log(state);
//         var str = "{'switch' : " + id + ", 'state' : " + state + " }";
//         var json = JSON.stringify(str);
//         console.log(json);

//          $.ajax({
//             type: "POST",
//             url: "/api/hvac.php",
//             data: json,
//             success: function(data) {
//                     console.log(data);

//             var response = JSON.parse(data);
//             console.log(data);

//             console.log(response);
//             if(response["status"] == "success") {
//                 alert(response["status"]);           
//             }
//             else {
//                 alert(response["reason"]);
//             }
//           }
//       });
//        });

//     });