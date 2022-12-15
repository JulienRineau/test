<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('active_link')) {
  function activate_menu($controller, $function = null) {
    $CI = get_instance();
    $class = $CI->router->fetch_class();
    if($function) {
        $method = $CI->router->fetch_method();
        return ($method == $function && $class == $controller) ? 'active' : '';
    }
    
    return ($class == $controller) ? 'active' : '';
  }
}?>