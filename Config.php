<?php
/**
 * Hyperion configuration.
 *
 */
define('DEFAULT_CONTROLLER', 'Main');
define('DEFAULT_METHOD', 'main');
define(APP_NAME, "Hyperion");
define(APP_NAME_SHORT, "Hy");
define(APP_DESCRIPTION, "Lightweight MVC");
define(APP_VERSION, "1.0");
define(HOSTNAME, "");
define(USERNAME, "");
define(PASSWORD, "");
define(DATABASE, "");
// REQUIRED FILES
require_once("vendor/saturn/hyperion/core/Bootstrap.class.php");
require_once("vendor/saturn/hyperion/core/Controller.class.php");
require_once("vendor/saturn/hyperion/core/Model.class.php");
require_once("vendor/saturn/hyperion/core/View.class.php");
require_once("vendor/saturn/hyperion/library/Database.class.php");
