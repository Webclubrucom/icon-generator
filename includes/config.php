<?php

define('PATH_ABSOLUTE', dirname(__FILE__) . '/../');
define('PATH_INCLUDES', PATH_ABSOLUTE . 'includes/');
define('PATH_HTML',     PATH_INCLUDES . 'html/');
define('PATH_JSON',     PATH_INCLUDES . 'json/');

require_once(PATH_INCLUDES . 'icon.generator.class.php');

$website['version'] = '1.2';
$website['url']     = icon_generator::website_url();
$website['current'] = icon_generator::current_url();
$website['icons']   = icon_generator::get_icons();
$website['more']    = array_rand($website['icons'], 12);
$website['count']   = count($website['icons']);
$website['count2']  = floor($website['count'] / 5) * 5;
$website['year']    = date('Y');
icon_generator::load_config($website);
?>