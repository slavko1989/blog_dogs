<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class UserView extends UserController{

	public function __construct(){
		parent::__construct();
	}

	public function view_users(){
		return $this->select_users();
	}
	public function execute_users(){
		if(isset($_GET["del_user"])){
			$this->delete_users($_GET["del_user"]);
		}
	}

	public function executeUsers(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_user"])){
		if($this->pass()!=$this->cnf_pass()){
			echo "<p style='color:red;'>password doesn't match</p>";
			}else{
				$this->valid();
			}
		}
	}
	public function loginUsers(){
		if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login_users"])){
			return $this->log($this->email(),$this->pass());
		}
	}
	public function session_logout(){
		if($this->logout()){
			echo "you are logout";
		}
	}
	public function executeWalker(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_w"])){
		echo "ok";
		 $this->valid_w();
			}else{
		//echo "<p style='color:brown;'>Hey, something get wrong</p>";
				
		}
	}

	public function view_walker(){
		return $this->select_walker();
	}

	public function view_walker_id(){
		if(isset($_GET["dog_w"])){
			return $this->select_walker_id($_GET["dog_w"]);
		}
	}
	public function admin_select_walkers(){
		return $this->walkers();
	}

}

?>