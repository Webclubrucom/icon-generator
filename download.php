<?php
// require the website config file.
require_once('includes/config.php');


// download the icon if the parameters are valid.
$slug = (isset($_GET['slug'])  ? $_GET['slug']  : false);
$data = (isset($_POST['data']) ? $_POST['data'] : false);
$data = base64_decode(str_replace(' ', '+', $data));
if ( isset($website['icons'][$slug]) && imagecreatefromstring($data) ) {
	header('content-type: image/png');
	header('content-disposition: attachment; filename=' . $slug . '.png');
	icon_generator::update_stats($website['icons'][$slug], 'downloads');
	echo $data;
	exit;
}
?>