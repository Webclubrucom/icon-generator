<?php

require_once('includes/config.php');
require_once('includes/install.class.php');

if ( isset($_REQUEST['install']) ) {
   header('content-type: application/json');
   echo json_encode(install::results($_POST));
   exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//RU" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Установка генератора иконок</title>

      <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/font.awesome.min.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/styles.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/install.css?v=<?php echo $website['version'];?>" rel="stylesheet" type="text/css" />

   </head>
   <body>

      <div id="hero">
         <div class="row container">
            <div class="col7">
               <h1>Установка генератора иконок</h1>
               <p>Добро пожаловать на страницу установки генератора иконок, пожалуйста, заполните настройки веб-сайта ниже и нажмите кнопку Установить, чтобы завершить внесение изменений.</p>
            </div>
         </div>
      </div>

      <div id="main">
         <div class="col12">
            <div class="row container">
               <div class="col12">
                  <h2>Настройки сайта</h2>
                  <p>Эти настройки используются для всего сайта.</p>
               </div>
			   <div class="col6">
				   <div class="col12">
					  <label for="website-name">Название сайта:</label>
					  <input id="website-name" type="text" placeholder="Напишите название сайта" value="Генератор иконок" />
				   </div>
				   <div class="col12">
					  <label for="contact-email">Email:</label>
					  <input id="contact-email" type="text" placeholder="Напишите Email" value="email@example.com" />
				   </div>
				   <div class="col12">
					  <label for="about-us">О сайте:</label>
					  <input id="about-us" rows="5" placeholder="Напишите информацию о сайте." value="Генератор иконок является мощным онлайн инструментом для создания иконок высокого качества без каких-либо навыков работы в фотошопе или иллюстраторе. Ты можешь просто выбрать нужные иконки из галереи и изменить цвет, размер, стиль и эффекты. Это проще, чем ты думаешь!"/>
				   </div>
			   </div>
			   <div class="col6">
				   <div class="col12">
					  <label for="vk-url">ВКонтакте:</label>
					  <input id="vk-url" type="text" placeholder="https://vk.com/example" value="https://vk.com/example" />
				   </div>
				   <div class="col12">
					  <label for="odnoklassniki-url">Одноклассники:</label>
					  <input id="odnoklassniki-url" type="text" placeholder="https://ok.ru/example" value="https://ok.ru/example" />
				   </div>
				   <div class="col12">
					  <label for="youtube-url">Youtube:</label>
					  <input id="youtube-url" type="text" placeholder="https://www.youtube.com/channel/example" value="https://www.youtube.com/channel/example" />
				   </div>
			   </div>

            </div>
         </div>
         <div class="col12">
            <div class="row container">
               <div class="col12">
                  <h2>Настройки иконок по-умолчанию</h2>
                  <p>Эти настройки используются на странице иконок по умолчанию.</p>
               </div>
			   
			   <div class="col6">
				   <div class="col12">
					  <label for="icon-background-shape">Форма фона иконки:</label>
					  <select id="icon-background-shape">
						 <option value="circle">Круг</option>
						 <option value="square">Квадрат</option>
						 <option value="diamond">Брилиант</option>
						 <option value="hexagon" selected="selected">Шестиугольник</option>
						 <option value="octagon">Восьмиугольник</option>
						 <option value="decagon">Десятиугольник</option>
					  </select>
				   </div>
				   <div class="col12">
					  <label for="icon-min-dimensions">Минимальные размеры иконки:</label>
					  <input id="icon-min-dimensions" type="number" min="40" max="1000" step="1" value="40" />
				   </div>
				   <div class="col12">
					  <label for="icon-max-dimensions">Максимальные размеры иконки:</label>
					  <input id="icon-max-dimensions" type="number" min="40" max="1000" step="1" value="1000" />
				   </div>
				   <div class="col12">
					  <label for="icon-background-dimensions">Размеры фона иконки:</label>
					  <input id="icon-background-dimensions" type="number" min="40" max="1000" step="1" value="500" />
				   </div>
				   <div class="col12">
					  <label for="icon-background-opacity">Прозрачность фона иконки:</label>
					  <input id="icon-background-opacity" type="number" min="0" max="1" step="0.1" value="1" />
				   </div>
				   <div class="col12">
					  <label for="icon-background-color">Цвет фона иконки:</label>
					  <input id="icon-background-color" type="text" value="#2E8ECE" />
				   </div>
				   <div class="col12">
					  <label for="icon-size">Размер иконки:</label>
					  <input id="icon-size" type="number" min="5" max="100" step="1" value="40" />
				   </div>
				   <div class="col12">
					  <label for="icon-opacity">Прозрачность иконки:</label>
					  <input id="icon-opacity" type="number" min="0" max="1" step="0.1" value="1" />
				   </div>
			   </div>
			   
			   
			   <div class="col6">
				   <div class="col12">
					  <label for="icon-color">Цвет иконки:</label>
					  <input id="icon-color" type="text" value="#FFFFFF" />
				   </div>
				   <div class="col12">
					  <label for="icon-shadow-depth">Глубина тени иконки:</label>
					  <input id="icon-shadow-depth" type="number" min="0" max="100" step="1" value="100" />
				   </div>
				   <div class="col12">
					  <label for="icon-shadow-angle">Угол тени иконки:</label>
					  <input id="icon-shadow-angle" type="number" min="0" max="360" step="1" value="45" />
				   </div>
				   <div class="col12">
					  <label for="icon-shadow-opacity">Прозрачность тени иконки:</label>
					  <input id="icon-shadow-opacity" type="number" min="0" max="1" step="0.1" value="0.4" />
				   </div>
				   <div class="col12">
					  <label for="icon-shadow-color">Цвет тени иконки:</label>
					  <input id="icon-shadow-color" type="text" value="#000000" />
				   </div>
				   <div class="col12">
					  <label for="icon-border-size">Размер границы иконки:</label>
					  <input id="icon-border-size" type="number" min="0" max="50" step="1" value="15" />
				   </div>
				   <div class="col12">
					  <label for="icon-border-opacity">Прозрачность границы иконки:</label>
					  <input id="icon-border-opacity" type="number" min="0" max="1" step="0.1" value="0.1" />
				   </div>
				   <div class="col12">
					  <label for="icon-border-color">Цвет границы иконки:</label>
					  <input id="icon-border-color" type="text" value="#FFFFFF" />
					  <input id="install" type="hidden" value="true" />
				   </div>
			   </div>
            </div>
         </div>
         <div>
            <div class="row container">
               <div class="col6">
                  <button id="rating-button">Задать вопрос</button>
               </div>
               <div class="col6">
                  <button id="follow-button">Группа ВКонтакте</button>
               </div>
               <div class="col12">
                  <button id="install-button">Установить</button>
               </div>
               <div id="install-messages" class="col12"></div>
            </div>
         </div>
      </div>

      <script src="<?php echo $website['url'];?>assets/js/javascript.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>
      <script src="<?php echo $website['url'];?>assets/js/install.js?v=<?php echo $website['version'];?>" type="text/javascript"></script>

   </body>
</html>