<?php
include_once(dirname(__FILE__)."../../spl/spl.php");

class TagsController extends PostModel{
	

	public function __construct(){
		parent::__construct();
	}
	
	public function add_tags($create){
		$this->query("insert into tags(tags_name)values(:tags_name)");
		$this->bind(":tags_name",$create["tags_name"]);
		return $this->execute();
	}
	public function create_tags(){
		$create_tags=array(
			"tags_name"=>$this->tagsName()
		);
		if(is_array($create_tags)){
		return $this->add_tags($create_tags);
		}
	}

	
	public function edit_tags($edit){
		$this->query("update tags set tags_name=:tags_name where tags_id=:tags_id");
		$this->bind(":tags_id",$edit["tags_id"]);
		$this->bind(":tags_name",$edit["tags_name"]);
		return $this->execute();
	}

	public function confirm_edit_tags(){
		$edit=array(
			"tags_id"=>$this->tagsId(),
			"tags_name"=>$this->tagsName()
			);
			if(is_array($edit)){
				return $this->edit_tags($edit);
		}
	}

	public function delete_tags($id){
		$this->query("delete from tags  where tags_id = :tags_id");
		$this->bind(":tags_id",$id);
		return $this->execute();
	}

	public function select_tags(){
		$this->query("select * from tags");
		return $this->fetch();
	}
	public function singl_tags($id){
		$this->query("select * from posts where tags_id=:tags_id");
		$this->bind(":tags_id",$id);
		return $this->fetch();
	}
	
}	