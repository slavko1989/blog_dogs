<?php

class Config{

	public function __construct(){}

	public function include_class(){

		include_once(dirname(__FILE__)."../../model/db.class.php");
		include_once(dirname(__FILE__)."../../model/postModel.class.php");
		include_once(dirname(__FILE__)."../../controller/postController.class.php");
		include_once(dirname(__FILE__)."../../controller/catController.class.php");
		include_once(dirname(__FILE__)."../../controller/tagsController.class.php");
		include_once(dirname(__FILE__)."../../controller/usersController.class.php");
		include_once(dirname(__FILE__)."../../controller/commController.class.php");
		include_once(dirname(__FILE__)."../../view/postView.class.php");
		include_once(dirname(__FILE__)."../../view/tagsView.class.php");
		include_once(dirname(__FILE__)."../../view/catView.class.php");
		include_once(dirname(__FILE__)."../../view/usersView.class.php");
		include_once(dirname(__FILE__)."../../view/commView.class.php");

	}


	public function exists_path_model(){
	$path_model = dirname(__FILE__)."../../model/";
    $extension = ".class.php";
    $fullPathModel = $path_model .  $class . $extension;
      if(!file_exists($fullPathModel)){
        return false;
    }
	include_once $fullPathModel;
	}

	public function exists_path_controller(){
	$path_controller = dirname(__FILE__)."../../controller/";
    $extension = ".class.php";
    $fullPathController = $path_controller .  $class . $extension;
      if(!file_exists($fullPathController)){
        return false;
    }
	include_once $fullPathController;
	}

	public function exists_path_view(){
	$path_view = dirname(__FILE__)."../../view/";
    $extension = ".class.php";
    $fullPathView = $path_controller .  $class . $extension;
      if(!file_exists($fullPathView)){
        return false;
    }
	include_once $fullPathView;
	}


}