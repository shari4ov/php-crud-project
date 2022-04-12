<?php 
 //Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once "../../config/Database.php";
include_once "../../models/Post.php";


 // instantiate DB & connect
$database = new Database();
$db= $database->connect();

print_r($_POST);

// instantiate blog post object
$post=new Post($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->name=$_POST['product-name'];
$post->status = $_POST['status']==='active' ? 1 : 0;
// create post
if($post->create()){
       echo json_encode(
              array('message'=>'Post created')
       );
} else{
       echo json_encode(
              array('message'=>'Post Not created')
       );
}

