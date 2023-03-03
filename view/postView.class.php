<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class PostView extends PostController{

	public function __construct(){
		parent::__construct();

	}
	public function sendPost(){
		return $this->executePost();	
	}
	public function allPostInAdminPanel(){
		return $this->selectPostsInAdminPanel();
	}

	public function selectBlogPost(){
		$num_per_page = 03;
		if(isset($_GET["page"])){
			$page = $_GET["page"];
		
		}else{
			$page = 1;
		}
		$start = ($page-1)*3;
		return $this->selectPostsPrepare($start,$num_per_page);
	}
	public function pag(){
		return $this->pagination_select();
	}
	public function view_single_post(){
		if(isset($_GET["view_more"])){
			return $this->single_post($_GET["view_more"]);
		}else{
			
		}

	}
	public function execute_edit_post(){
		if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["ed_post"])){
			echo "<p style='color:red;'>UPDATE</p>";
			$this->confirmEdit();
		}

	}
	public function delete_post(){
		if(isset($_GET["del_id"])){
			echo "<p style='color:red;'>DELETED</p>";
			return $this->delete($_GET["del_id"]);
		}
	}

	public function executeRaiting(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_r"])){
		if(isset($_SESSION["user_id"]) && isset($_SESSION['user_email'])){
			echo "you vote";
			$this->create_raitings();
			}else{
				echo "<p style='color:red;font-weight:bolder;'>Login if you want to vote</p>";
			}
		}
	}

	public function view_stars($id,$pid){
			return $this->select_stars($id,$pid);
	}
	public function view_avg_stars($id){
	return $this->avg_stars($id);
	}
	public function list_the_stars($id){
		return $this->avg_stars($id);
	}
	public function create_live_search(){
		if(isset($_POST['input'])){
			 return $this->live_search($_POST['input']);
		}
	}
}

?>