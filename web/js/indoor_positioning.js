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
	btn.id = name;
	div.appendChild(btn);
	var del = document.createElement("A");
	del.className = "btn btn-circle btn-primary";
	del.innerHTML = "X";
	del.onclick = delete_button;
	del.id = name;
	div.appendChild(del);
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

function delete_button(){
	var id = $(this).attr('id');
	console.log(id);
    var json = {"table_name":"indoor_pos_tb","name":id};
    $.ajax({
        type:"POST",
        url:"/api/delete.php",
        data: json,
        success: function(data){
            var response = JSON.parse(data);
            if(response["status"] == "success") {
                location.reload();
            }
            else {
                alert(response["reason"]);
            }
        }
    });
}

