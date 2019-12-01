<?php

require_once('./database.php');
require_once('./queries.php');
require_once('./helpers.php');

// To create a new user, make a POST request with a username, and a password.
// Remember to use password_hash() to hash the password

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
//     $query = allPosts();
//     $posts = runQuery($query);
  
//     header("Content-type: application/json");
//     echo json_encode($posts);
//   }

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['username'])){
      $username = $_POST['username'];
    }
    if(isset($_POST['password'])){
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    $sql =  createAUser($username, $password);
    $resultId = runQuery($sql);

    header("Content-Type: application/json");
    http_response_code(200);
    echo json_encode(['id' => $resultId, 'username' => $username]);

  }
