<?php
/**
 * configuration file
 */

error_reporting(E_ERROR | E_WARNING | E_PARSE);
date_default_timezone_set('UTC');
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath($_SERVER['DOCUMENT_ROOT']) . DS);
define('CORE_DIR', ROOT_DIR . 'core' . DS);
define('SITE_DIR', 'http://' . str_replace('http://', '', $_SERVER['HTTP_HOST'] . '/'));
if(count($arr = explode('.', $_SERVER['HTTP_HOST'])) > 2) {
    $sub_domain = array_shift($arr);
    $project = in_array($sub_domain, array(
        'www',
        'dev'
    )) ? 'frontend' : $sub_domain;

} else {
    $project = 'backend';
}
define('MAIN_SITE_DIR', 'http://' . str_replace('http://', '', implode('.', $arr) . '/'));
define('PROJECT', $project);
define('TEMPLATE_DIR', ROOT_DIR . 'templates' . DS . PROJECT . DS);
define('CONTROLLER_DIR', ROOT_DIR . 'controllers' . DS . PROJECT . DS);
define('LIBS_DIR', ROOT_DIR . 'libs' . DS);
define('IMAGE_DIR', SITE_DIR . '/images/' . PROJECT . '/');
define('DEVELOPMENT_MODE', true);


define('DB_NAME', 'quote');
define('DB_USER', 'quote');
define('DB_PASSWORD', 'asd12345');
define('DB_HOST', 'localhost');

