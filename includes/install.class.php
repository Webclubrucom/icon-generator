<?php
class install extends icon_generator {


   public static $settings = array();
   public static $files    = array(
      'install.php',
      'assets/js/install.js',
      'assets/css/install.css',
      'includes/install.class.php'
   );


   public static function addsetting($setting, $value, $type) {
      switch ( $type ) {
         case 'string':
            self::$settings[$setting] = (string)urldecode($value);
         break;
         case 'float':
            self::$settings[$setting] = (float)urldecode($value);
         break;
      }
      return true;
   }


   public static function inrange($value, $min, $max, $string = false) {
      if ( $string ) {
         $value = strlen($value);
      }
      return ($value >= $min && $value <= $max);
   }


   public static function isshape($shape) {
      return in_array($shape, array('circle', 'square', 'diamond', 'hexagon', 'octagon', 'decagon'));
   }


   public static function iscolor($color) {
      return preg_match('/^(\#(([0-9a-f]{3}){1,2}))|rgba?\(([0-9\.\,\s]+)\)$/i', $color);
   }


   public static function validate_params($method) {
      $errors = array();
      if ( self::addsetting('website-name', $method['website-name'], 'string') && !self::inrange($method['website-name'], 1, 100, true) ) {
         $errors[] = 'Пожалуйста, введите название сайта длиной от 1 до 100 символов!';
      }
      if ( self::addsetting('contact-email', $method['contact-email'], 'string') && !self::inrange($method['contact-email'], 5, 200, true) ) {
         $errors[] = 'Пожалуйста, введите адрес электронной почты длиной от 5 до 200 символов!';
      }
      if ( self::addsetting('vk-url', $method['vk-url'], 'string') && !self::inrange($method['vk-url'], 10, 200, true) ) {
         $errors[] = 'Пожалуйста, введите URL страницы ВКонтакте длиной от 10 до 200 символов!';
      }
      if ( self::addsetting('odnoklassniki-url', $method['odnoklassniki-url'], 'string') && !self::inrange($method['odnoklassniki-url'], 10, 200, true) ) {
         $errors[] = 'Пожалуйста, введите URL страницы Одноклассники длиной от 10 до 200 символов!';
      }
      if ( self::addsetting('youtube-url', $method['youtube-url'], 'string') && !self::inrange($method['youtube-url'], 10, 200, true) ) {
         $errors[] = 'Пожалуйста, введите URL страницы Youtube длиной от 10 до 200 символов!';
      }
      if ( self::addsetting('about-us', $method['about-us'], 'string') && !self::inrange($method['about-us'], 1, 1000, true) ) {
         $errors[] = 'Пожалуйста, введите текст длиной от 1 до 1000 символов!';
      }
      if ( self::addsetting('icon-background-shape', $method['icon-background-shape'], 'string') && !self::isshape($method['icon-background-shape']) ) {
         $errors[] = 'Пожалуйста, выберите допустимую форму фона иконки!';
      }
      if ( self::addsetting('icon-min-dimensions', $method['icon-min-dimensions'], 'float') && !self::inrange($method['icon-min-dimensions'], 40, 1000) ) {
         $errors[] = 'Пожалуйста, введите минимальные размеры иконки размером от 40 до 1000!';
      }
      if ( self::addsetting('icon-max-dimensions', $method['icon-max-dimensions'], 'float') && !self::inrange($method['icon-max-dimensions'], 40, 1000) ) {
         $errors[] = 'Пожалуйста, введите максимальные размеры иконки размером от 40 до 1000!';
      }
      if ( self::addsetting('icon-background-dimensions', $method['icon-background-dimensions'], 'float') && !self::inrange($method['icon-background-dimensions'], 40, 1000) ) {
         $errors[] = 'Пожалуйста, введите размеры фона иконки размером от 40 до 1000!';
      }
      if ( self::addsetting('icon-background-opacity', $method['icon-background-opacity'], 'float') && !self::inrange($method['icon-background-opacity'], 0, 1) ) {
         $errors[] = 'Пожалуйста, введите значение прозрачности фона иконки от 0 до 1!';
      }
      if ( self::addsetting('icon-background-color', $method['icon-background-color'], 'string') && !self::iscolor($method['icon-background-color']) ) {
         $errors[] = 'Пожалуйста, введите цвет фона иконки в формате hex или rgb!';
      }
      if ( self::addsetting('icon-size', $method['icon-size'], 'float') && !self::inrange($method['icon-size'], 5, 100) ) {
         $errors[] = 'Пожалуйста, введите размер иконки от 5 до 100!';
      }
      if ( self::addsetting('icon-opacity', $method['icon-opacity'], 'float') && !self::inrange($method['icon-opacity'], 0, 1) ) {
         $errors[] = 'Пожалуйста, введите значение непрозрачности иконки от 0 до 1!';
      }
      if ( self::addsetting('icon-color', $method['icon-color'], 'string') && !self::iscolor($method['icon-color']) ) {
         $errors[] = 'Пожалуйста, введите цвет иконки в формате hex или rgb!';
      }
      if ( self::addsetting('icon-shadow-depth', $method['icon-shadow-depth'], 'float') && !self::inrange($method['icon-shadow-depth'], 0, 100) ) {
         $errors[] = 'Пожалуйста, введите глубину тени иконки от 0 до 100!';
      }
      if ( self::addsetting('icon-shadow-angle', $method['icon-shadow-angle'], 'float') && !self::inrange($method['icon-shadow-angle'], 0, 360) ) {
         $errors[] = 'Пожалуйста, введите угол тени иконки от 0 до 360!';
      }
      if ( self::addsetting('icon-shadow-opacity', $method['icon-shadow-opacity'], 'float') && !self::inrange($method['icon-shadow-opacity'], 0, 1) ) {
         $errors[] = 'Пожалуйста, введите значение прозрачности тени иконки от 0 до 1!';
      }
      if ( self::addsetting('icon-shadow-color', $method['icon-shadow-color'], 'string') && !self::iscolor($method['icon-shadow-color']) ) {
         $errors[] = 'Пожалуйста, введите цвет тени иконки в формате hex или rgb!';
      }
      if ( self::addsetting('icon-border-size', $method['icon-border-size'], 'float') && !self::inrange($method['icon-border-size'], 0, 50) ) {
         $errors[] = 'Пожалуйста, введите размер границы иконки от 0 до 50!';
      }
      if ( self::addsetting('icon-border-opacity', $method['icon-border-opacity'], 'float') && !self::inrange($method['icon-border-opacity'], 0, 1) ) {
         $errors[] = 'Пожалуйста, введите значение прозрачности границы иконки от 0 до 1!';
      }
      if ( self::addsetting('icon-border-color', $method['icon-border-color'], 'string') && !self::iscolor($method['icon-border-color']) ) {
         $errors[] = 'Пожалуйста, введите цвет границы иконки в формате hex или rgb!';
      }
      return $errors;
   }


   public static function results($method) {
      $errors = self::validate_params($method);
      if ( empty($errors) ) {
         self::put_json('config', self::$settings);
         $config = self::get_json('config');
         if ( empty($config) ) {
            $errors[] = 'Нам не удалось сохранить настройки вашего сайта, пожалуйста, убедитесь, что file_get_contents и file_put_contents включены!';
         }
         else {
            foreach ( self::$files as $file ) {
               if ( !unlink(PATH_ABSOLUTE . $file) ) {
                  $errors[] = 'Мы смогли сохранить настройки вашего сайта, но не смогли удалить файл' . $file . ', пожалуйста, удалите его вручную!';
               }
            }
         }
      }
      return array('status' => !empty($errors) ? 'error' : 'success', 'messages' => !empty($errors) ? $errors : array(
         'Сайт успешно установлен! Ваши настройки были сохранены, а страница установки была автоматически удалена.',
         'Пожалуйста, не забудьте оставить комментарий в группе ВК. Вы будете перенаправлены на главную страницу через 10 секунд'
      ));
   }


}
?>