<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class PostController extends PostModel{
	

	public function __construct(){
		parent::__construct();

	}
	public function preparePost($create){
		
		$this->query("insert into posts(name_post,img_post,text_post,date_post,tags_id,cat_post_id)
		values(:name_post,:img_post,:text_post,:date_post,:tags_id,:cat_post_id)");
		$this->bind(":name_post",$create["name_post"]);
		$this->bind(":img_post",$create["img_post"]);
		$this->bind(":text_post",$create["text_post"]);
		$this->bind(":date_post",$create["date_post"]);
		$this->bind(":tags_id",$create["tags_id"]);
		$this->bind(":cat_post_id",$create["cat_post_id"]);
		return $this->execute();
	}

	public function executePost(){
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_post"])){
		echo "added new post";
			$this->valid();
		}
	}
	
	public function valid(){

		if(empty($this->namePost()) or
			empty($this->imgPost()) or
			empty($this->textPost()) or 
			empty($this->tagsId()) or 
			empty($this->catId()) ){
					echo "fill something";
			}else{
				$this->create();
    			$this->img_upload();
			}
	}
	public function img_upload(){
		$errors = array();
		$file = $this->imgPost();
		$file_tmp = $this->imgPostTmp();
		$folder = dirname(__FILE__)."../../images/blog_images/".$file;
		$file_size = $_FILES['img_post']["size"];
		$file_type = $_FILES['img_post']['type'];
		$file_exte = pathinfo($file, PATHINFO_EXTENSION);
		$exte = array("jpg","png","jpeg","avif");
		if(in_array($file_exte,$exte)===false){
			$errors[]="extensions not alowed, please choose jpeg or png";
		}
		if($file_size>50000000){
			$errors[]="file size must be exately 5mb";
		}
		if(empty($errors)==true){
			move_uploaded_file($file_tmp, $folder);
		}else{
			print_r($errors);
		}
	}

	public function create(){
		$date = date("Y-m-d\TH:i:sP");
		$create_post=array(
			"name_post"=>$this->namePost(),
			"img_post"=>$this->imgPost(),
			"text_post"=>$this->textPost(),
			"tags_id"=>$this->tagsId(),
			"cat_post_id"=>$this->catId(),
			"date_post"=>$date
		);
		if(is_array($create_post)){
		return $this->preparePost($create_post);
		}
	}

	public function selectPostsPrepare(){
		$this->query("select * from posts");
		return $this->fetch();
		
	}
	public function single_post($id){
		$this->query("select * from posts where post_id=:post_id");
		$this->bind("post_id",$id);
		return $this->fetch();
	}

		public function editPost($edit){
		
		$this->query("update posts set name_post=:name_post,img_post=:img_post,text_post=:text_post,date_post=:date_post,tags_id=:tags_id,cat_post_id=:cat_post_id where post_id=:post_id");
		$this->bind(":name_post",$edit["name_post"]);
		$this->bind(":img_post",$edit["img_post"]);
		$this->bind(":text_post",$edit["text_post"]);
		$this->bind(":date_post",$edit["date_post"]);
		$this->bind(":tags_id",$edit["tags_id"]);
		$this->bind(":cat_post_id",$edit["cat_post_id"]);
		$this->bind(":post_id",$edit["post_id"]);

		return $this->execute();
	}
	public function confirmEdit(){
		$date = date("Y-m-d\TH:i:sP");
		$ed_post = array(
			"name_post"=>$this->namePost(),
			"img_post"=>$this->imgPost(),
			"text_post"=>$this->textPost(),
			"tags_id"=>$this->tagsId(),
			"cat_post_id"=>$this->catId(),
			"date_post"=>$date,
			"post_id"=>$this->idPost()
			);
		if(is_array($ed_post)){
			return $this->editPost($ed_post);
		}
	}

	public function delete($id){

		$this->query("delete from posts where post_id=:post_id");
		$this->bind(":post_id",$id);
		$this->execute();
	}
	public function raiting($create){
		$this->query("insert into raitings(r_stars,user_id,post_id)
		values(:r_stars,:user_id,:post_id)");
		$this->bind(":r_stars",$create["r_stars"]);
		$this->bind(":user_id",$create["user_id"]);
		$this->bind(":post_id",$create["post_id"]);	
		return $this->execute();
	}
	public function create_raitings(){
		$create_r=array(
			"r_stars"=>$this->stars(),
			"user_id"=>$this->usersId(),
			"post_id"=>$this->idPost()
		);
		if(is_array($create_r)){
		return $this->raiting($create_r);
		}
	}
	public function select_stars($id,$pid){
		$this->query("select * from raitings where user_id=:user_id and post_id=:post_id");
		$this->bind(":user_id",$id);
		$this->bind(":post_id",$pid);
		return $this->fetch();
	}
	public function avg_stars($id){
		$this->query("select 
		avg(raitings.r_stars) as avg,raitings.r_id,
		posts.img_post,posts.name_post,posts.post_id
		from raitings
		inner join posts on raitings.post_id = posts.post_id
		 where posts.post_id=:post_id order by avg desc");
		$this->bind(":post_id",$id);
		return $this->fetch();
	}
}

?>