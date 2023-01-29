<?php
include_once(dirname(__FILE__)."/config_for_autoload.php");
$config = new Config();
$config->include_class();

spl_autoload_register('autoload');
function autoload($class){
    $path_model = dirname(__FILE__)."../../model/";
    $extension = ".class.php";
    $fullPathModel = $path_model .  $class . $extension;
      if(!file_exists($fullPathModel)){
        return false;
    }
    $path_controller = dirname(__FILE__)."../../controller/";
    $extension = ".class.php";
    $fullPathController = $path_controller .  $class . $extension;
      if(!file_exists($fullPathController)){
        return false;
    }
    $path_view = dirname(__FILE__)."../../view/";
    $extension = ".class.php";
    $fullPathView = $path_controller .  $class . $extension;
      if(!file_exists($fullPathView)){
        return false;
    }
    include_once $fullPathView;
    include_once $fullPathController;
    include_once $fullPathModel;
}

    