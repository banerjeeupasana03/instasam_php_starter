<?php

require_once('./database.php');
require_once('./queries.php');
require_once('./helpers.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
  $query = allPosts();
  $posts = runQuery($query);

  header("Content-type: application/json");
  echo json_encode($posts);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_POST['user_id'])){
    $userId = $_POST['user_id'];
  }
  if(isset($_POST['image-url'])){
    $imageUrl = $_POST['image-url'];
  }
  if(isset($_POST['message'])){
    $message = $_POST['message'];
  }
  $sql = createAPost($userId, $message, $imageUrl);
  $result = runQuery($sql);
  
  header("Content-Type: application/json");
  http_response_code(200);
  echo json_encode(['id' => $result]);

}