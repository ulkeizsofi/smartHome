$(function(){
	$("#add-button-pos").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var btn_name = prompt("Please enter the name of the object:","ObjectName1");
		if (btn_name != null){

		//sendToDB(switch_name);
		var div = document.createElement("DIV");

		var btn = document.createElement("A");
		btn.className = "btn btn-circle btn-primary";
		console.log(btn);
		btn.innerHTML = btn_name;

		div.appendChild(btn);

		console.log(div);

		document.getElementById("button_area").appendChild(div);
		console.log(document.getElementById("button_area"));
	}
	});
});

function sendToDBPos(name){
	var data = "{'name':" + name + "}";
	console.log(data);
	$.ajax({
		type: "POST",
		url:"/api/indoor_positioning.php",
		data: data,
    	contentType: "application/json",
    	success:function(data){
    		alert(data);
    	}
    }
	);
}
