<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

/*
if(!$update)
{
  exit;
}
*/

require "functions.php";

/*===================================
            VAR SETTING
===================================*/

/* MESSAGE ARRAY SET */
$message = isset($update['message']) ? $update['message'] : "";

/* UTILITY VARS SET*/
$text = isset($message['text']) ? $message['text'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";

/* COMMAND STRING SET */
$command = isset($message['text']) ? $message['text'] : "";
$command = trim($command);
$command = strtolower($command);

/* TEST VALUES */
$response = $command;
$method  = "sendMessage";

/*===================================
            ADMIN COMMANDS
===================================*/
if(strtolower($username) == 'stefaniscion'){
  if($command == '/getjson'){
    $response = json_encode($update);
    $method  = "sendMessage";
    
    send($response,$method,$getId);
    send($response,$method,$getId);
    send($response,$method,$getId);
    send($response,$method,$getId);
    send($response,$method,$getId);
    }
}


/*===================================
            USER COMMANDS
===================================*/
if($command == '/procioni'){
  $response = 'procioniih';
  $method  = "sendMessage";
  
}


/*===================================
              RESPONSE 
===================================*/
header("Content-Type: application/json");

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = $method;

echo json_encode($parameters);
