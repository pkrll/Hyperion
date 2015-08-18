<?php
/*************************************
 * *  DEFAULT CONTROLLER AND METHOD  *
 * ***********************************
 * The default controller and method
 * will be called when a controller or
 * a method does not exist or when the
 * URL path is empty.
 */
define('DEFAULT_CONTROLLER', 'Main');
define('DEFAULT_METHOD', 'main');
/*************************************
 * *     DATABASE CONFIGURATION      *
 * ***********************************
 * Set the below values if you want to
 * use a database. Hyperion supports:
 * MySQL.
 */
define('HOSTNAME', "");
define('USERNAME', "");
define('PASSWORD', "");
define('DATABASE', "");
/*************************************
 * *          MVC SETTINGS           *
 * ***********************************
 * Refrain from changing these values.
 *
 */
define('APP_NAME', "Hyperion");
define('APP_NAME_SHORT', "Hy");
define('APP_DESCRIPTION', "Lightweight MVC");
define('APP_VERSION', "1.0");
define('ROOT', 		    dirname(dirname(dirname(__DIR__))));
define('CONTROLLERS',   ROOT.'/application/controllers');
define('MODELS',        ROOT.'/application/models');
define('VIEWS',         ROOT.'/application/views');
define('TEMPLATES',     ROOT.'/application/templates');
define('INCLUDES',      ROOT.'/application/includes');
