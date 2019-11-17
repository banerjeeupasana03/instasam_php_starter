<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'instasam');

function runQuery($sql) {
  // Connect to the database
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($connection, 'utf8mb4');
  if(mysqli_connect_errno()) {
    exit("Database connection failed: (" . mysqli_connect_errno() . ")");
  }

  // Run the query
  $results = mysqli_query($connection, $sql);
  if (!$results) {
    exit("Database query failed. ". mysqli_errno ($connection));
  }

  // Handle the results
  if (gettype($results) === 'boolean') {
    return mysqli_insert_id($connection);
    // return $results; 
  }
  
  $count = mysqli_num_rows($results);
  $data = [];
  for ($i = 0; $i < $count; $i++) {
    $row = mysqli_fetch_assoc($results);
    $data[] = $row;
  }

  mysqli_free_result($results);
  mysqli_close($connection);

  return $data;
}


