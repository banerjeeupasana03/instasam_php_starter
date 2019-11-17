<?php

require_once('./database.php');
require_once('./queries.php');
require_once('./helpers.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  if (!isset($_GET['postId'])) {
    exitError("You need to supply an postId");
  }

  $postId = $_GET['postId'];
  $query = allCommentsForPost($postId);
  $results = runQuery($query);

  header("Content-type: application/json");
  echo json_encode($results);
}