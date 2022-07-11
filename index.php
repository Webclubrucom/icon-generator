<?php require_once('includes/config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//RU" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $website['website-name'];?></title>
      <meta name="description" content="Создавайте пользовательские иконки из набора значков Font Awesome." />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/font.awesome.min.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/styles.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />

   </head>
   <body>

      <?php include_once(PATH_HTML . 'header.php');?>

      <?php include_once(PATH_HTML . 'hero.php');?>

      <?php include_once(PATH_HTML . 'main.php');?>

      <?php include_once(PATH_HTML . 'footer.php');?>

      <script src="<?php echo $website['url'];?>assets/js/javascript.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>
      <script src="<?php echo $website['url'];?>assets/js/icon.sort.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>

   </body>
</html>