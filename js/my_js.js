//function to validate empty field
function check_empty() {
	if (document.getElementById('reg_code').value == ""
		|| document.getElementById('display_name').value == "") {
		alert ("Fill All Fields !");
	} else {  
		//document.getElementById('form').submit();  
		// alert ("Form submitted successfully...");
		// The form can now be submitted.
		var formData = {
            'reg_code'              : $('input[name=reg_code]').val(),
            'display_name'             : $('input[name=display_name]').val()
        };
		$.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'index.php?action=register_device', // the url where we want to POST
            data        : formData, // our data object
            // dataType    : 'json', // what type of data do we expect back from the server
            encode      : true,
			success     : function (result) {
				setTimeout("div_hide()",1000);
			},
			error 		: function (result) {
				alert(result[0]);
				div_hide();
			}
        });
		
	}
}

//function to display Popup
function success(){
	document.getElementById('abc').style.display = "none";
}

//function to display Popup
function div_show(){
	document.getElementById('abc').style.display = "block";
}

//function to hide Popup
function div_hide(){ 
	document.getElementById('abc').style.display = "none";
}

