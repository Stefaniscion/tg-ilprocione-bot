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


/*===================================
            ADMIN COMMANDS
===================================*/
if(strtolower($username) == 'stefaniscion'){
  
  if($command == '/getjson'){
    $r_text = json_encode($update);
    $r_method  = "sendMessage";
  }
  
  if(isset($message['photo'])){
    $r_text = json_encode($update);
    $r_method  = "sendMessage";
  }

}


/*===================================
            USER COMMANDS
===================================*/

if($command == '/procioni'){
  $r_photo = 'AgADBAADPq4xG0ywaVNmFWcUiz1zlzB5mhoABHw3FPdcBTNC9M4GAAEC';
  $r_method  = "sendPhoto";
  
}

/*===================================
              RESPONSE 
===================================*/
header("Content-Type: application/json");

$parameters = array(
                    'chat_id' =>  $chatId, 
                    'text'    =>  $r_text,
                    'photo'   =>  $r_photo
                   );
$parameters["method"] = $r_method;

echo json_encode($parameters);

