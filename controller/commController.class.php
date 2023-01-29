<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class CommController extends PostModel{
	

	public function __construct(){
		parent::__construct();

	}
	public function prepareComm($create){
		
		$this->query("insert into comm(comm_text,user_id,post_id,comm_date)
		values(:comm_text,:user_id,:post_id,:comm_date)");
		$this->bind(":comm_text",$create["comm_text"]);
		$this->bind(":user_id",$create["user_id"]);
		$this->bind(":post_id",$create["post_id"]);
		$this->bind(":comm_date",$create["comm_date"]);
	
		return $this->execute();
	}

	public function valid(){

		if(empty($this->comm()) ){
			echo "fill something";
			}else{
				$this->create();
			}
	}

	public function create(){

		$select = new PostView();
          $loop = $select->view_single_post();
          if(is_array($loop) || is_object($loop)){
          foreach($loop as $posts){
          	$id = $posts->post_id;
          }
      }
		if(isset($_SESSION["user_id"])){
		$date = date("Y-m-d\TH:i:sP");
		$create_comm=array(
			"comm_text"=>$this->comm(),
			"user_id"=>$_SESSION["user_id"],
			"post_id"=>@$id,
			"comm_date"=>$date
		);
	}
		if(is_array($create_comm)){
		return $this->prepareComm($create_comm);
		}
	
}
	public function user_comm($id){
		$this->query("select comm.comm_id, comm.comm_text,comm.comm_date,
			users.user_id,users.u_name,users.u_img
			from comm 
			inner join users on comm.user_id =  users.user_id
			inner join posts on comm.post_id = posts.post_id
			where posts.post_id=:post_id");
		$this->bind("post_id",$id);
		return $this->fetch();
	}

	public function count_comm($id){
		$stmt =$this->connect()->prepare("select * from comm where post_id=:post_id");
		$stmt->bindValue(":post_id",$id);
		$stmt->execute();
		$rez = $stmt->rowCount();
		echo $rez;
	}

	public function delete_comm($id){
		$this->query("delete from comm where comm_id=:comm_id");
		$this->bind(":comm_id",$id);
		$this->execute();
	}

	// replay

	public function prepareRep($create){
		
		$this->query("insert into replay_comm(rep_text,comm_id,user_id,post_id,rep_date)
		values(:rep_text,:comm_id,:user_id,:post_id,:rep_date)");
		$this->bind(":rep_text",$create["rep_text"]);
		$this->bind(":comm_id",$create["comm_id"]);
		$this->bind(":user_id",$create["user_id"]);
		$this->bind(":post_id",$create["post_id"]);
		$this->bind(":rep_date",$create["rep_date"]);
		return $this->execute();
	}
	public function validRep(){

		if(empty($this->rep_comm()) ){
			echo "fill something";
			}else{
				$this->createRep();
			}
	}
	public function createRep(){

		$select = new PostView();
          $loop = $select->view_single_post();
          if(is_array($loop) || is_object($loop)){
          foreach($loop as $posts){
          	$id = $posts->post_id;
          }
      }

		if(isset($_SESSION["user_id"])){
		$date = date("Y-m-d\TH:i:sP");
		$create_rep=array(

			"rep_text"=>$this->rep_comm(),
			"comm_id"=>$this->commId(),
			"user_id"=>$_SESSION["user_id"],
			"post_id"=>@$id,
			"rep_date"=>$date
		);
	}
		if(is_array($create_rep)){
		return $this->prepareRep($create_rep);
		}
	}

	public function user_rep($id){
		$this->query("select comm.comm_id,
			replay_comm.rep_text,replay_comm.rep_date,replay_comm.rep_id,
			users.user_id,users.u_name,users.u_img
			from replay_comm 
			inner join users on replay_comm.user_id =  users.user_id
			inner join posts on replay_comm.post_id = posts.post_id
			inner join comm on replay_comm.comm_id = comm.comm_id
			where comm.comm_id=:comm_id");
		$this->bind("comm_id",$id);
		return $this->fetch();
	}
	
}

?>