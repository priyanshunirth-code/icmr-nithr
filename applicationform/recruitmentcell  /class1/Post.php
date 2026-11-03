<?php require_once("../class/BaseClass.php");  ?>
<?php
class Post {
private $post_id;
private $post_name;
private $project_name;
public function getPost_id(){return $this->post_id;} public function setPost_id($post_id){$this->post_id = $post_id;}
public function getPost_name(){return $this->post_name;} public function setPost_name($post_name){$this->post_name = $post_name;}
public function getProject_name(){return $this->project_name;} 
public function setProject_name($project_name){$this->project_name = $project_name;}

public function readPost(){
	$obj = new BaseClass;
	$obj->dbConnect();
	$stmt = $obj->dbconn->prepare("select post_id from post");
        $stmt->execute();
        $stmt->bind_result($post_id, $post_name);
	while($stmt->fetch()){echo "<option value='$post_id'>$post_name</option>";}
        $stmt->close();
}
}
?>