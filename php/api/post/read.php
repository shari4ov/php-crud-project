<?php 
 //Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 
 include_once '../../config/Database.php';
 include_once '../../models/Post.php';

 // instantiate DB & connect
$database = new Database();
$db= $database->connect();

// instantiate blog post object
$post=new Post($db);

// blog post query

$result = $post->read();
// get row count
$num=$result->rowCount();
// Check if any posts
if($num > 0){
       // post array
       $posts_arr=array();
       $posts_arr['data'] = array();

       while($row = $result->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $post_item= array(
                     'product_id'=>$product_id,
                     'name'=>$name,
                     'status'=>$status
              );
              // Push to "data"
              array_push($posts_arr['data'],$post_item);
       }
       // turn to json & output
       echo json_encode($posts_arr);
}else {
       // no post 
       echo json_encode(
              array('message'=>'No posts found')
       ); 
}
?>