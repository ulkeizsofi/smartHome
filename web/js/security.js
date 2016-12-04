$(function(){
	$(".security input").change(function(e){
		e.preventDefault();
		
        console.log(this);
        var state = this.checked;
        if (state == false){
        	this.checked = true;
        }
        else{
        var obj = {'state':state };
         $.ajax({
            type: "POST",
            url: "/api/security.php",
            data: obj,
            success: function(data) {
                            console.log(data);

            var response = JSON.parse(data);

            if(response["status"] == "success") {
               alert(response["status"]);           
            }
            else {
                alert(response["reason"]);
            }
        }
    	});

	}
});
});

function loadSecurity(){
		var ids = ["security_tb","security"];
		var val;
        console.log("Here");
        var jsonArr = JSON.stringify(ids);
            $.ajax({
            type: "POST",
            url: "/api/refresh.php",
            data: {data:jsonArr},
            success: function(data) {
            console.log(data);
            var response = JSON.parse(data);

            if(response["status"] == "success") {
                el = document.getElementById("security_switch");
                var val = response[ids[1]] == "1" ? true : false;
                console.log(el);
                el.checked = val;
            }
            else {
                alert(response["reason"]);
            }
        }
    });
}