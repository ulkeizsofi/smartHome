$(function(){
	$("#login_btn").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var login_form = _this.closest("form");

		var formData = getFormData(login_form);
    console.log(login_form);
    console.log(formData);

		$.ajax({
		  type: "POST",
		  url: "/api/login.php",
		  data: formData,
		  success: function(data) {
		  			console.log(data);

		  	var response = JSON.parse(data);
			console.log(data);

		  	console.log(response);
		  	if(response["status"] == "success") {
				 window.location.href = "index.php?page=home";		  	
			}
		  	else {
		  		alert(response["reason"]);
		  	}
		  }
		  // dataType: dataType
		});

		console.log(formData);
	});
});
//	<h2><?php etrans("welcome"); ?></h2>


$(function(){
	$("#signup_btn").click(function(e){
		e.preventDefault();
		var _this = $(this);
		var signup_form = _this.closest("form");
		var formData = getFormData(signup_form);
		console.log(JSON.stringify(formData));
		$.ajax({
		  type: "POST",
		  url: "/api/signup.php",
		  data: formData,
		  success: function(data) {
		  	var response = JSON.parse(data);
		  	console.log(response);
		  	if(response["status"] == "success") {
		  		alert("Success! Now you can log in :)");
		  	}
		  	else {
		  		alert(response["reason"]);
		  	}
		  }
		  // dataType: dataType
		});

		console.log(formData);
	});
});

function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function openNav() {
    document.getElementById("menuSidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("menuSidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}