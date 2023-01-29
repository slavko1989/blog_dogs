<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class CommView extends CommController{

	public function __construct(){
		parent::__construct();

	}
	
	public function executeComm(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_comm"])){
		if(isset($_SESSION["user_id"]) && isset($_SESSION['user_email'])){
			echo "added new commenst";
			$this->valid();
			}else{
				echo "failed";
			}
		}
	}

	public function view_user_comm($id){
		if($this->user_comm($id)){
			return $this->user_comm($id);
		}else{
			echo "nothing to show at this moment";
		}
	}
	public function show_count_comm($id){
		if($this->count_comm($id)){
			return $this->count_comm($id);
		}
	}

	public function execute_comm(){
		if(isset($_GET["del_comm"])){

			//header("location:../../../php_projects/blog/index.php");
			return $this->delete_com($_GET["del_comm"]);
			//header("location:../../../php_projects/blog/index.php");
		}
	}
	public function executeRep(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_rep"])){
		if(isset($_SESSION["user_id"]) && isset($_SESSION['user_email'])){
			echo "added new replay";
			$this->validRep();
			}else{
				echo "failed replay";
			}
		}
	}
	public function view_user_rep($id){
		if($this->user_rep($id)){
			return $this->user_rep($id);
		}else{
			echo "nothing to show at this moment";
		}
	}
	
}

?>