<?php
define('DEFAULT_CONTROLLER', 'Main');
define('DEFAULT_METHOD', 'main');
define(APP_NAME, "");
define(APP_NAME_SHORT, "");
define(APP_DESCRIPTION, "");
define(APP_VERSION, "");

// DATABASE CONSTANTS
define(HOSTNAME, "");
define(USERNAME, "");
define(PASSWORD, "");
define(DATABASE, "");

// REQUIRED SYSTEM FILES
require_once("vendor/saturn/hyperion/core/Bootstrap.class.php");
require_once("vendor/saturn/hyperion/core/Controller.class.php");
require_once("vendor/saturn/hyperion/core/Model.class.php");
require_once("vendor/saturn/hyperion/core/View.class.php");
require_once("vendor/saturn/hyperion/library/Database.class.php");
