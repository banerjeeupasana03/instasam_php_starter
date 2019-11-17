<?php

function exitError($message) {
  header("Content-type: application/json");
  http_response_code(400);
  echo json_encode(["message" => $message]);
  exit();
}
