//function to validate empty field
function check_empty() {
	if (document.getElementById('reg_code').value == ""
		|| document.getElementById('display_name').value == "") {
		alert ("Please fill All Fields !");
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
            encode      : true,
			success     : function (result) {
				/* get the table element. */
				var $TABLE = $("#table").find("table");
				var $reg_code = document.getElementById('reg_code').value;
				$("#popupContact").html(result);
				setTimeout("div_hide()",5000);
				
				var GET_parameters = "action=get_display_record&reg_code=" + $reg_code;
				$.ajax({
					type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
					url         : 'index.php?'+GET_parameters, // the url where we want to POST
					encode      : true,
					success     : function (result) {					
						$TABLE.append(result);
						refreshRemoveScript();
					},
					error 		: function (result) {
						
					}
				});
			},
			error 		: function (result) {
				$("#popupContact").html(result);
				setTimeout("div_hide()",5000);
			}
        });
	}
}

//function to display Popup
function div_show(){
	document.getElementById('blur').style.display = "block";
}

//function to hide Popup
function div_hide(){ 
	document.getElementById('blur').style.display = "none";
}
//function to hide Popup
function removeDisplay(reg_code){
	var $TABLE = $("#table").find("table");
	var GET_parameters = "action=remove_display&reg_code=" + reg_code;
	$.ajax({
			type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'index.php?'+GET_parameters, // the url where we want to POST
			success     : function (result) {
				// alert(result);
				// addHtml(result ,"#popupContact");
				$TABLE.find("[rid=\""+reg_code+"\"]").detach();
				$("#popupContact").html(result);
				setTimeout("div_hide()",5000);
			},
			error 		: function (result) {
				$("#popupContact").html(result);
				setTimeout("div_hide()",5000);
			}
        });
}

function refreshRemoveScript() {
	$('.table-remove').click(function () {
		// $(this).parents('tr').detach();
		show_RemoveDisplayDialog($(this).attr("value"));
	});
}

// function to display the add 
function show_AddDisplay_dialog(){
	var GET_parameters = "action=get_registerdevice_dialog";
	getDialog(GET_parameters);
	document.getElementById('blur').style.display = "block";
}

// function to display Popup
function show_RemoveDisplayDialog(reg_code){

	var GET_parameters = "action=remove_display_confirmation&reg_code=" + reg_code;
	getDialog(GET_parameters);
	document.getElementById('blur').style.display = "block";
}

function getDialog (parameters){
	$.ajax({
			type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'index.php?'+parameters, // the url where we want to POST
            // data        : formData, // our data object
            // dataType    : 'json', // what type of data do we expect back from the server
            // encode      : true,
			success     : function (result) {
				$("#popupContact").html(result);
				// setTimeout("div_hide()",1000);
			},
			error 		: function (result) {
				alert(result);
				setTimeout("div_hide()",5000);
			}
        });
}