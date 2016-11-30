<?php
	$dialog_message = "The requested operatrion is complete.";
	if (isset($message)){
		$dialog_message = $message;
	}
	$dialog_title = "Information";
	if (isset($title)) {
		$dialog_title = $title;
	}

	echo "<div class=\"dialog\">";
	echo "	<img src=\"./themes/default/img/popup_close.png\" id=\"close\" onclick=\"div_hide()\">";
	echo "	<h2>".$dialog_title."</h2><hr>";
	echo "	<P>".$dialog_message."</P>";
	echo "	<a id=\"submit\" href=\"javascript: div_hide()\">close</a>";
	echo "</div>";

?>