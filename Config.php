<?php
/**
 * Hyperion configuration.
 *
 */
define('APP_NAME', "Hyperion");
define('APP_NAME_SHORT', "Hy");
define('APP_DESCRIPTION', "Lightweight MVC");
define('APP_VERSION', "1.0");
define('HOSTNAME', "");
define('USERNAME', "");
define('PASSWORD', "");
define('DATABASE', "");
define('DEFAULT_CONTROLLER', 'Main');
define('DEFAULT_METHOD', 'main');
define('ROOT', 		    dirname(dirname(dirname(__DIR__))));
define('CONTROLLERS',   ROOT.'/application/controllers');
define('MODELS',        ROOT.'/application/models');
define('VIEWS',         ROOT.'/application/views');
define('TEMPLATES',     ROOT.'/application/templates');
define('INCLUDES',      ROOT.'/application/includes');
