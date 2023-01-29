<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class CatView extends CatController{

	public function __construct(){
		parent::__construct();

	}
	
	public function execute_cat(){
		if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_cat"]))
		if(empty($this->catName())){
			echo "please fill row";
		}else{
			echo "category added";
			return $this->create_cat();
		}
	}
	public function viewAllCat(){
		if($this->select_cat()){
			return $this->select_cat();
		}else{
			echo "nothing to show at this moment";
		}
	}

	public function select_single_cat(){
		if(isset($_GET["cat_id"])){
		return $this->single_cat($_GET["cat_id"]);
		}
	}

	public function confirm_delete(){
		if(isset($_GET["del_id"])){
			echo "DELETE";
			return $this->delete_cat($_GET["del_id"]);
		}
	}

	public function execute_edit_cat(){
		if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["ed_cat"])){
			echo "record is successfully updated";
			$this->confirm_edit_cat();
		}else{
			echo "something went wrong";
		}
	}
}

?>