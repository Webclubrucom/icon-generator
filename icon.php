<?php
// require the website config file.
require_once('includes/config.php');


// if the icon doesn't exist redirect to index.
if ( !isset($_GET['slug']) || !isset($website['icons'][$_GET['slug']]) ) {
   icon_generator::website_redirect($website['url'], 'HTTP/1.1 301 Moved Permanently');
}
else {
   $icon = $website['icons'][$_GET['slug']];
   icon_generator::update_stats($icon, 'views');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $icon['name'];?> icon</title>
      <meta name="description" content="edit the <?php echo $icon['name'];?> icon and download it in png format." />

      <!-- website stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/font.awesome.min.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/styles.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />

   </head>
   <body>

      <?php // include the website header.?>
      <?php include_once(PATH_HTML . 'header.php');?>

      <?php // include the website hero.?>
      <?php include_once(PATH_HTML . 'hero.php');?>

      <?php // include the website main.?>
      <?php include_once(PATH_HTML . 'main.php');?>

      <?php // include the website footer.?>
      <?php include_once(PATH_HTML . 'footer.php');?>

      <!-- website javascript -->
      <script id="ig-icon-data" type="application/json"><?php echo json_encode($icon);?></script>
      <script src="<?php echo $website['url'];?>assets/js/javascript.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>
      <script src="<?php echo $website['url'];?>assets/js/icon.generator.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>

   </body>
</html>