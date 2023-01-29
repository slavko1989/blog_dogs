<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class CatController extends PostModel{
	

	public function __construct(){
		parent::__construct();

	}
	public function add_cat($create){
		$this->query("insert into category_post(cat_post_name)values(:cat_post_name)");
		$this->bind(":cat_post_name",$create["cat_post_name"]);
		return $this->execute();
	}
	public function create_cat(){
		$create_cat=array(
			"cat_post_name"=>$this->catName()
		);
		if(is_array($create_cat)){
		return $this->add_cat($create_cat);
		}
	}

	public function edit_cat($edit){
		$this->query("update category_post set cat_post_name=:cat_post_name
			where cat_post_id=:cat_post_id");
		$this->bind(":cat_post_id",$edit["cat_post_id"]);
		$this->bind(":cat_post_name",$edit["cat_post_name"]);
		return $this->execute();
	}
	public function confirm_edit_cat(){
		$ed = array("cat_post_id"=>$this->catId(),
					"cat_post_name"=>$this->catName());
		if(is_array($ed)){
			return $this->edit_cat($ed);
		}
	}

	public function delete_cat($id){
		$this->query("delete from category_post  where cat_post_id = :cat_post_id");
		$this->bind(":cat_post_id",$id);
		return $this->execute();
	}

	public function select_cat(){
		$this->query("select * from category_post");
		return $this->fetch();
	}
	public function single_cat($id){
		$this->query("select * from posts where cat_post_id=:cat_post_id");
		$this->bind(":cat_post_id",$id);
		return $this->fetch();
	}
	
}	
	
