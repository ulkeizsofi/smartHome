$(function(){
	$("#add-button-pos").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var btn_name = prompt("Please enter the name of the object:","ObjectName1");
		if (btn_name != null){
		sendToDBPos(btn_name);

		
	}
	});
});

function createButton(name){
	var div = document.createElement("DIV");
	var btn = document.createElement("A");
	btn.className = "btn btn-circle btn-primary";
	btn.innerHTML = name;
	div.appendChild(btn);
	document.getElementById("button_area").appendChild(div);
	console.log(document.getElementById("button_area"));
}

function sendToDBPos(name){
	var data = {"name": name};
	console.log(data);
	$.ajax({
		type: "POST",
		url:"/api/indoor_positioning.php",
		data: data,
    	success:function(data1){
    		console.log(data1);
    		createButton(name);
    	}
    }
	);
}


function loadIndoorPos(){
		var ids = ["indoor_pos_tb","*"];
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
                   		createButton(key);
                	}
                });
            }
            else {
                alert(response["reason"]);
            }
          }
      });
	}