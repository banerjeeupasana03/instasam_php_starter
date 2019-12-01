<?php

require_once('./database.php');
require_once('./queries.php');
require_once('./helpers.php');

// This must be a post request with a username and a password
// Remember to use password_verify() to check the plain password against the hashed version
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    $sql = findAUser($username);
    $result = runQuery($sql);
    // echo json_encode($result);
    $count = count($result);
    for($i = 0; $i < $count; $i++){
        $row = $result[$i];
        if(password_verify($password, $row['password'])){
            $found = $row;
        break;
        }
    }
    header("Content-Type: application/json");
    
    if(isset($found)) {
        http_response_code(200);
        echo json_encode(['id' => $found['id'], 'username' => $found['username']]);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'user does not exist']);
    }
   
}