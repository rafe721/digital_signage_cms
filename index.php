<?php

/**
 * A simple, clean and secure PHP Login Script / MINIMAL VERSION
 * For more versions (one-file, advanced, framework-like) visit http://www.php-login.net
 *
 * Uses PHP SESSIONS, modern password-hashing and salting and gives the basic functions a proper login system needs.
 *
 * @author Panique
 * @link https://github.com/panique/php-login-minimal/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// checking for minimum PHP version
/* if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, A Minimum of PHP 5.3.7 is needed");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
} */

// include the configs / constants for the database connection
require_once("config/db.php");

// load the login class
require_once("classes/auth/Login.php");

// Check for the action
$action = "";
if (isset($_GET["action"])) {
	$action = $_GET["action"];
}
/* Some actinos do not need user to be logged in.. */
switch($action) {
	case "checkin":
		include("actions/checkin.php");
		exit();
		break;
	default:
		continue;
}
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
$message = "";
// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == false) {
    // user not logged in
	$message = $login->message;
	include("pages/login.php");
} else {
    // user logged in.. check for actions to be taken..
	switch ($action) {
		case "register_device": {
			include("actions/registerDevice.php");
			exit();
		}
		case "get_registerdevice_dialog": {
			include("services/get_addDisplayForm.php");
			exit();
		}
		break;
		case "remove_display_confirmation": {
			include("services/showRemoveDisplayConfirmation.php");
			exit();
		}
		break;
		case "remove_display": {
			include("actions/removeDisplay.php");
			exit();
		}
		break;
		case "get_display_record": {
			include("actions/fetchTableRecord.php");
			exit();
		}
		break;
	}
	/* if no action is to be taken, determine which page is to be navigated to.  */
	$page = "";
	if (isset($_GET["p"])) {
		$page = $_GET["p"];
	}
	$tab = "";
	if (isset($_GET["tab"])) {
		$tab = $_GET["tab"];
	}

	switch ($page) {
		case "dashboard": {
				include("pages/trial.php");
			} // dashboard block ends
			break;
		case "display_status": {
			include("pages/trial.php");
			} // display_status block ends
			break;
		default:
			include("pages/trial.php");
	}

}
