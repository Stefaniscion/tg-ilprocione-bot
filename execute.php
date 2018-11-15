<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

/* VAR SETTING */
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

/* FORMATTA COMMAND */
$command = isset($message['text']) ? $message['text'] : "";
$command = trim($command);
$command = strtolower($command);


/* PARAMETRI RESPONSE */
$response = json_encode($update);
$method  = "sendMessage";

header("Content-Type: application/json");

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = $method;

echo json_encode($parameters);
