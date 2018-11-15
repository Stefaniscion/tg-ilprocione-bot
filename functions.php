<?php

function send($response,$method,$chatId){
  header("Content-Type: application/json");
  $parameters = array('chat_id' => $chatId, "text" => $response);
  $parameters["method"] = $method;
  echo json_encode($parameters);
}

?>
