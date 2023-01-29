<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class TagsView extends TagsController{

	public function __construct(){
		parent::__construct();

	}
	
	public function execute_tags(){
		if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_tags"])){
		if(empty($this->tagsName())){
			echo "please fill row";
		}else{
			echo "tags added";
			return $this->create_tags();
		}
	  }
	}

	public function viewAllTags(){
		if($this->select_tags()){
			return $this->select_tags();
		}else{
			echo "nothing to show at this moment";
		}
	}
	public function select_singl_tag(){
		if(isset($_GET["tags_id"])){
			return $this->singl_tags($_GET["tags_id"]);
		}
	} 
	public function execute_edit_tags(){
		if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["ed_tags"])){
			echo "successfully eded";
			$this->confirm_edit_tags();
		}
	}
	public function confirm_delete(){
		if(isset($_GET["del_id"])){
			echo "DELETE";
			return $this->delete_tags($_GET["del_id"]);
		}
	}
}

?>