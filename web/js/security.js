$(function(){
	$(".switch input").change(function(e){
		e.preventDefault();
		
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
        var jsonArr = JSON.stringify(ids);
            $.ajax({
            type: "POST",
            url: "/api/refresh.php",
            data: {data:jsonArr},
            success: function(data) {

            var response = JSON.parse(data);

            if(response["status"] == "success") {
                el = document.getElementById(ids[1]);
                var val = response[ids[1]] == "1" ? true : false;
                el.checked = val;
            }
            else {
                alert(response["reason"]);
            }
          }
      });
	}