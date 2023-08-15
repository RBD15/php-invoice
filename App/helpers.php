<?php 

function createResponse($data,$code){
  header("Content-Type: application/json");
  http_response_code($code);
  $response=$data;
  $response=json_encode(["message"=>$response]);
  echo $response;
  exit();
}

?>