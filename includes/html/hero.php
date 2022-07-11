<!-- website hero -->
<div id="hero">
   <div class="row container">
      <div class="col6">
         <?php if ( isset($icon) ):?>

            <h1>Иконка "<?php echo $icon['name'];?>"</h1>
            <p>Отредактируйте значок "<?php echo $icon['name'];?>" и скачайте его в формате png для использования в ваших приложениях, сайтах и других проектах.</p>

         <?php else:?>

            <h1><?php echo $website['website-name'];?></h1>
            <p>Настраивайте иконки из набора Font Awesome 4.7.0, у нас есть более <?php echo $website['count2'];?>+ иконок, которые можно настроить и скачать в формате png.</p>

         <?php endif;?>
      </div>
   </div>
</div>