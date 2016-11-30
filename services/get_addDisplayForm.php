<?php

	echo "<form action=\"index.php?action=register_device\" method=\"post\" id=\"form\" name=\"reg_device_form\">";
	echo "		<img src=\"./themes/default/img/popup_close.png\" id=\"close\" onclick=\"div_hide()\">";
	echo "		<h2>Register new device</h2><hr>";
	echo "		<input type=\"text\" id=\"reg_code\" placeholder=\"Registration Code\" name=\"reg_code\">";
	echo "		<input type=\"text\" id=\"display_name\" placeholder=\"Display Name\" name=\"display_name\">";
	echo "		<a id=\"submit\" href=\"javascript: check_empty()\">Confirm</a>";
	echo "</form>";

?>