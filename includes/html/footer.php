<!-- website footer -->
<div id="footer">
   <div>
      <div class="row container">
         <div class="col4">
         	<span>Мы в соц сетях</span>
         	<div>
               <a href="<?php echo $website['vk-url'];?>" target="_blank"><i class="fa fa-vk"></i>ВКонтакте</a>
               <a href="<?php echo $website['odnoklassniki-url'];?>" target="_blank"><i class="fa fa-odnoklassniki"></i>Одноклассники</a>
               <a href="<?php echo $website['youtube-url'];?>" target="_blank"><i class="fa fa-youtube"></i>Youtube</a>
               
         	</div>
         </div>
         <div class="col4">
         	<span><?php echo $website['website-name'];?></span>
         	<div>
               <a href="<?php echo $website['url'];?>">Главная</a>
               <a href="mailto:<?php echo $website['contact-email'];?>"><?php echo $website['contact-email'];?></a>
         	</div>
         </div>
         <div class="col4">
         	<span>О сайте</span>
         	<div>
         	   <p><?php echo $website['about-us'];?></p>
         	</div>
         </div>
      </div>
   </div>
   <div>
      <div class="row container">
         <div class="col12">
            <p><?php echo $website['website-name'];?> - <?php echo $website['year'];?>. Все права защищены.</p>
         </div>
      </div>
   </div>
</div>