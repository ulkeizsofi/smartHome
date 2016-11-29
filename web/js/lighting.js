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

        var tr = $("<tr>");
        tr.append("<td>" + switch_name + "</td>");
        var label = $("<label>").addClass("switch");
        var input = $("<input>").attr("type", "checkbox")
                                .attr("id", switch_name)
                                .on("change", switchChange)
                                .prop("checked", value);
        label.append(input).append("<div class='slider round'>");

        tr.append($("<td>").append(label));
        var btn = $("<button>").attr("class","btn btn-primary")
                                .attr("type", "button")
                                .attr("id", switch_name)
                                .on("click",deleteSwitch)
                                .html("X");
        tr.append($("<td>").append(btn));
        $("#switch_area tbody").append(tr);


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

function deleteSwitch(){
    var id = $(this).attr('id');
    var json = {"table_name":"lighting_tb","name":id};
    $.ajax({
        type:"POST",
        url:"/api/delete.php",
        data: json,
        success: function(data){
            console.log(data);
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