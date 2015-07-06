<?php
date_default_timezone_set("Europe/Stockholm");
// SYSTEM SPECIFIC CONSTANTS
define('DEFAULT_CONTROLLER', 'Main');
define('DEFAULT_METHOD', 'main');
define(APP_NAME, "Hyperion");
define(APP_NAME_SHORT, "");
define(APP_DESCRIPTION, "");
define(APP_VERSION, "");

// DATABASE CONSTANTS
define(HOSTNAME, "");
define(USERNAME, "");
define(PASSWORD, "");
define(DATABASE, "");

// REQUIRED SYSTEM FILES
require_once("core/Model.class.php");
require_once("core/View.class.php");
require_once("core/Controller.class.php");
require_once("Database.class.php");
require_once("Session.class.php");