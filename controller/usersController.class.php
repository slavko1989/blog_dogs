<?php
include_once(dirname(__FILE__)."../../spl/spl.php");
class UserController extends PostModel{
	
	public function __construct(){
		parent::__construct();
	}

	public function select_users(){
		$this->query("select * from users");
		return $this->fetch();
	}

	public function delete_users($id){
			$this->query("delete from users where user_id=:user_id");
			$this->bind(":user_id",$id);
			return $this->execute();
	}
	public function prepareUsers($create){
		$this->query("insert into users(u_name,u_email,u_pass,u_img)
		values(:u_name,:u_email,:u_pass,:u_img)");
		$this->bind(":u_name",$create["u_name"]);
		$this->bind(":u_email",$create["u_email"]);
		$this->bind(":u_pass",$create["u_pass"]);
		$this->bind(":u_img",$create["u_img"]);
		return $this->execute();
	}
	public function valid(){
		if(empty($this->name()) or
			empty($this->email()) or
			empty($this->pass()) or
			empty($this->cnf_pass()) or
			empty($this->img()) ){
				echo "<p style='color:green;'>fill something</p>";
			}elseif(!preg_match("/^[a-zA-Z-' ]*$/",$this->name())){
				echo "Only letters and white space allowed";
			}elseif(!filter_var($this->email(), FILTER_VALIDATE_EMAIL)){
				echo "The email address is incorrect";
			}elseif(strlen($this->pass()) < 5){
				echo "password is too short(minimun 5 characters)";
			}elseif(strlen($this->pass()) > 20 ){
				echo "password is too big(maximun 20 characters)";
			}else{
			echo "<p style='color:brown;'>Hey, bravo!You can login now</p>";
			$this->create();
			$this->img_upload();
			}
	}


	public function img_upload(){
		$errors = array();
		$file = $this->img();
		$file_tmp = $this->img_tmp();
		$folder = dirname(__FILE__)."../../images/user_images/".$file;
		$file_size = $_FILES['u_img']["size"];
		$file_type = $_FILES['u_img']['type'];
		$file_exte = pathinfo($file, PATHINFO_EXTENSION);
		$exte = array("jpg","png","jpeg");
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
		//$hash = password_hash($this->pass(), PASSWORD_DEFAULT);
		$create_u=array(
			"u_name"=>$this->name(),
			"u_email"=>$this->email(),
			"u_pass"=>$this->pass(),
			"u_img"=>$this->img()
					);
		if(is_array($create_u)){
		return $this->prepareUsers($create_u);
		}
	}
public function log($email,$pass){
		$stmt = $this->connect()->prepare("select * from users where u_email=:u_email and u_pass=:u_pass");
		$stmt->bindValue(":u_email",$email);
		$stmt->bindValue(":u_pass",$pass);
		$stmt->execute();
		if($stmt->rowCount()==0){
				echo "Your are not sign in,try again";
				}else{
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		//if(password_verify($this->pass(), $result['u_pass'])){
		$_SESSION['user_name'] = $result['u_name'];
		$_SESSION['user_email'] = $result['u_email'];
		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['admin'] = $result['u_type'];
		$_SESSION['user_name'] = $result['u_name'];
		$_SESSION['img'] = $result['u_img'];
		if($_SESSION['admin']  == '1'){
			header("location:../../../php_projects/blog/admin/index.php");
			}else{
			header("location:../../../php_projects/blog/index.php");
				}
		}
	//}
}
	public function logout(){
		session_unset();
		session_destroy();
	}

	
// WALKER FUNCTIONS
public function insert_walker($create){
	$this->query("insert dog_w(walker_img,full_name,email,phone,education,work_exp)
		values(:walker_img,:full_name,:email,:phone,:education,:work_exp)");
		$this->bind(":walker_img",$create["walker_img"]);
		$this->bind(":full_name",$create["full_name"]);
		$this->bind(":email",$create["email"]);
		$this->bind(":phone",$create["phone"]);
		$this->bind(":education",$create["education"]);
		$this->bind(":work_exp",$create["work_exp"]);
	return $this->execute();
}
	public function img_upload_walker(){
		$errors = array();
		$file = $_FILES['walker_img']["name"];
		$file_tmp = $_FILES['walker_img']["tmp_name"];
		$folder = dirname(__FILE__)."../../images/dog_w/".$file;
		$file_size = $_FILES['walker_img']["size"];
		$file_type = $_FILES['walker_img']['type'];
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
	public function create_walker(){
		$create_w=array(
			"walker_img"=>$_FILES['walker_img']["name"],
			"full_name"=>$_POST["full_name"],
			"email"=>$_POST["email"],
			"phone"=>$_POST["phone"],
			"education"=>$_POST["education"],
			"work_exp"=>$_POST["work_exp"]
					);
		if(is_array($create_w)){
		return $this->insert_walker($create_w);
		}
	}
	public function valid_w(){
		if(empty($_FILES['walker_img']["name"]) or
			empty($_POST["full_name"]) or
			empty($_POST["email"]) or
			empty($_POST["phone"]) or
			empty($_POST["education"]) or
			(empty($_POST["work_exp"])) ){
					echo "<p style='color:green;'>fill something</p>";
			}else{
				$this->create_walker();
			$this->img_upload_walker();
			}
	}
	public function select_walker(){
		$this->query("select * from dog_w limit 5");
		return $this->fetch();
	}
	public function select_walker_id($id){
		$this->query("select * from dog_w where w_id = :w_id");
		$this->bind(":w_id",$id);
		return $this->fetch();
	}
	public function walkers(){
		$this->query("select * from dog_w");
		return $this->fetch();
	}
}
?>