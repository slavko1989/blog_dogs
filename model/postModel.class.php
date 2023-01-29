<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class PostModel extends Db{
	private $namePost;
	private $textPost;
	private $imgPost;
	private $idPost;
	private $datePost;
	private $imgPostTmp;
	private $tagsName;
	private $tagsId;
	private $catName;
	private $catId;
	private $usersId;
	private $name;
	private $email;
	private $pass;
	private $cnf_pass;
	private $img;
	private $comm;
	private $commId;
	private $rep_comm;
	private $repId;
	private $stars;
	protected $stmt;

	public function __construct(){
		parent::__construct();
		$this->stars();
	$this->namePost();
	$this->idPost();
	$this->imgPost();
	$this->textPost();
	$this->datePost();
	$this->imgPostTmp();
	$this->tagsName();
	$this->tagsId();
	$this->catName();
	$this->catId();
	$this->usersId();
	$this->name();
	$this->email();
	$this->pass();
	$this->cnf_pass();
	$this->img();
	$this->comm();
	$this->commId();
	$this->rep_comm();
	$this->repId();
	}
public function stars(){
		if(isset($_POST["r_stars"])){
			return $this->stars = $_POST["r_stars"];
		}
	}

public function rep_comm(){
		if(isset($_POST["rep_text"])){
			return $this->rep_comm = $_POST["rep_text"];
		}
	}
	public function repId(){
		if(isset($_POST["rep_id"])){
			return $this->repId = $_POST["rep_id"];
		}
	}
	public function commId(){
		if(isset($_POST["comm_id"])){
			return $this->commId = $_POST["comm_id"];
		}
	}

	public function comm(){
		if(isset($_POST["comm_text"])){
			return $this->comm = $_POST["comm_text"];
		}
	}

	public function name(){
		if(isset($_POST["u_name"])){
			return $this->name = $_POST["u_name"];
		}
	}
	public function email(){
		if(isset($_POST["u_email"])){
			return $this->email = $_POST["u_email"];
		}
	}
		public function pass(){
		if(isset($_POST["u_pass"])){
			return $this->pass = $_POST["u_pass"];
		}
	}
		public function usersId(){
		if(isset($_POST["user_id"])){
			return $this->usersId = $_POST["user_id"];
		}
	}
		public function cnf_pass(){
		if(isset($_POST["cnf_pass"])){
			return $this->cnf_pass = $_POST["cnf_pass"];
		}
	}
		public function img(){
		if(isset($_FILES["u_img"]["name"])){
			return $this->img = $_FILES["u_img"]["name"];
		}
	}
		public function img_tmp(){
		if(isset($_FILES["u_img"]["tmp_name"])){
			return $this->img = $_FILES["u_img"]["tmp_name"];
		}
	}

	public function namePost(){
		if(isset($_POST["name_post"])){
			return $this->namePost = $_POST["name_post"];
		}
	}
	public function imgPost(){
		if(isset($_FILES["img_post"]["name"])){
			return $this->imgPost = $_FILES["img_post"]["name"];
		}
	}
	public function imgPostTmp(){
		if(isset($_FILES["img_post"]["tmp_name"])){
			return $this->imgPostTmp = $_FILES["img_post"]["tmp_name"];
		}
	}
	public function textPost(){
		if(isset($_POST["text_post"])){
			return $this->textPost = $_POST["text_post"];
		}
	}
	public function idPost(){
		if(isset($_POST["post_id"])){
			return $this->idPost = $_POST["post_id"];
		}
	}
	public function datePost(){
		if(isset($_POST["date_post"])){
			return $this->datePost = $_POST["date_post"];
		}
	}

public function tagsName(){
		if(isset($_POST["tags_name"])){
			return $this->tagsName = $_POST["tags_name"];
		}
	}
	public function tagsId(){
		if(isset($_POST["tags_id"])){
			return $this->tagsId = $_POST["tags_id"];
		}
	}
	public function catName(){
		if(isset($_POST["cat_post_name"])){
			return $this->catName = $_POST["cat_post_name"];
		}
	}
	public function catId(){
		if(isset($_POST["cat_post_id"])){
			return $this->catId = $_POST["cat_post_id"];
		}
	}

	public function query($query){
		$this->stmt = $this->connect()->prepare($query);
		
	}
	    public function bind($param, $value,$type = null)
    {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
          break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          break;
          case is_array($value):
          $type = PDO::FETCH_ASSOC;
          break;
          case is_object($value):
          $type = PDO::FETCH_OBJ;
          break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          break;

          default:
            $type = PDO::PARAM_STR;
          break;
        }
      }
      $this->stmt->bindValue($param, $value,$type);
    }

	public function execute(){
		 $this->stmt->execute();
		
	}
	 public function fetch()
    {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

     public function fetchAllAss()
    {
    	$this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>