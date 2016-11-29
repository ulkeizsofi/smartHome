$(function(){
    $('.selectpicker').change(function(e) {
    	var lang= $(this).val();
    	console.log(lang);
    	languageChanged(lang);
    });

    $('.selectpicker').val(crtLang);
});

function languageChanged(lang) {
		$.ajax({
	  type: "GET",
	  url: "/api/changeLanguage.php?langToSet=" + lang,
	  success: function(data) {
	  			console.log(data);

	  	var response = JSON.parse(data);
		console.log(data);

	  	console.log(response);
	  	if(response["status"] == "success") {
			 window.location.href = window.location.href;		  	
		}
	  	else {
	  		alert(response["reason"]);
	  	}
	  }
	});
}

$(function(){
	$("#log-out").click(function(e){
		e.preventDefault();
		 window.location.href = "index.php?page=logout";		  	

	});
});

