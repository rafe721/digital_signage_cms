<?php

	echo "<div class=\"dialog\">";
	echo "	<img src=\"./themes/default/img/popup_close.png\" id=\"close\" onclick=\"div_hide()\">";
	echo "	<h2>Remove Display?</h2><hr>";
	$displayCodeString = "";
	if (isset($_GET["reg_code"])) {
		$displayCodeString = " Its registration code is <strong>".$_GET["reg_code"]."</strong>. ";
	}
	echo "	<P>Are you sure you want to remove this display from the system?".$displayCodeString."</P>";	
	echo "	<a id=\"submit\" href=\"javascript: removeDisplay('".$_GET["reg_code"]."')\">Yes</a>";
	// echo "	<a id=\"submit\" href=\"javascript: removeDisplay()\">Yes</a>";
	echo "	<a id=\"submit\" href=\"javascript: div_hide()\">No</a>";
	echo "</div>";

?>