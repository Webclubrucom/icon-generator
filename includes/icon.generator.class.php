<?php
class icon_generator {


   public static function website_protocol() {
      return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' && $_SERVER['HTTPS'] ? 'https' : 'http');
   }


   public static function website_url() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . preg_replace('/\/$/', '', dirname($_SERVER['PHP_SELF'])) . '/';
   }


   public static function current_url() {
      return self::website_protocol() . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   }


   public static function website_redirect($url, $header = false) {
      if ( $header ) {
         header($header);
      }
      header('location: ' . $url);
      exit;
   }


   public static function get_json($filename) {
      if ( file_exists(PATH_JSON . $filename . '.json') ) {
         $data = file_get_contents(PATH_JSON . $filename . '.json');
         $data = json_decode($data, true);
      }
      return (isset($data) ? $data : array());
   }


   public static function put_json($filename, $data) {
      $json = json_encode($data);
      file_put_contents(PATH_JSON . $filename . '.json', $json);
   }


   public static function pattern_replace($string, $pattern, $delimiter) {
      $string = preg_replace($pattern, $delimiter, $string);
      return trim($string, $delimiter);
   }


   public static function update_stats($icon, $type) {
      $stats = self::get_json('stats');
      if ( !isset($stats[$icon['class']][$type]) ) {
         $stats[$icon['class']][$type] = 0;
      }
      ++$stats[$icon['class']][$type];
      self::put_json('stats', $stats);
   }


   public static function get_icons() {
      $icons = self::get_json('icons');
      $stats = self::get_json('stats');
      $count = count($icons);
      for ( $i = 0; $i < $count; ++$i ) {
         $icons[$i]['icon']         = html_entity_decode('&#x' . $icons[$i]['unicode'] . ';');
         $icons[$i]['name']         = self::pattern_replace($icons[$i]['class'], '/[^a-z0-9]+/', ' ');
         $icons[$i]['slug']         = self::pattern_replace($icons[$i]['class'], '/[^a-z0-9]+/', '-');
         $icons[$i]['url']          = self::website_url() . 'icon/' . $icons[$i]['slug'];
         $icons[$i]['views']        = (isset($stats[$icons[$i]['class']]['views'])     ? $stats[$icons[$i]['class']]['views']     : 0);
         $icons[$i]['downloads']    = (isset($stats[$icons[$i]['class']]['downloads']) ? $stats[$icons[$i]['class']]['downloads'] : 0);
         $icons[$i]['total']        = $icons[$i]['views'] + $icons[$i]['downloads'];
         $icons[$icons[$i]['slug']] = $icons[$i];
         unset($icons[$i]);
      }
      return $icons;
   }


   public static function load_config(&$global) {
      $config = self::get_json('config');
      if ( !empty($config) ) {
         foreach ( $config as $name => $value ) {
            $global[$name] = $value;
         }
      }
      else if ( !preg_match('/install\.php$/', $global['current']) ) {
         self::website_redirect($global['url'] . 'install.php');
      }
   }


}
?>