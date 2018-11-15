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
  
  elseif(isset($message['photo'])){
    $r_text = json_encode($update);
    $r_method  = "sendMessage";
  }

}


/*===================================
            USER COMMANDS
===================================*/
if($command == '/help'){
  $r_text = '
  help - Imparara a comunicare con i procioni!\n
  about - Info su questo procione e sul suo creatore\n
  procioni - Invia foto di procioni\n
  selfie - Ti invio un mio selfie\n
  piave- Per soli veri procioni italiani\n
  ';
  $r_method  = "sendMessage";
}

if($command == '/about'){
  $r_text = '
  Il Procione\n
  Corretto e mantenuto da: @Stefaniscion\n
  Puoi trovare il procione sorgente su: https://github.com/Stefaniscion/ilprocione-bot\n
  Versione: v1.0 Procione del 15/11/2018\n
  ';
  $r_method  = "sendMessage";
}

if($command == '/procioni'){
  $photo_num = rand(1,5);
  if($photo_num == 1){
    $r_photo = 'AgADBAADPq4xG0ywaVNmFWcUiz1zlzB5mhoABHw3FPdcBTNC9M4GAAEC';
  }
  elseif($photo_num == 2){
    $r_photo = 'AgADBAADQK4xG0ywaVOXv1jo2V-0KfSaoBoABFnAsfn6r5UV9cQEAAEC';
  }
  elseif($photo_num == 3){
    $r_photo = 'AgADBAADQ64xG0ywaVMGQliPQqtvugllwxoABEperj8ek4m914oAAgI';
  }
  elseif($photo_num == 4){
    $r_photo = 'AgADBAADRa4xG0ywaVNpoqKTI4pKLeF7mhoABKwBCNR2e2FRG9AGAAEC';
  }
  elseif($photo_num == 5){
    $r_photo = 'AgADBAADRq4xG0ywaVN_f3LbmbI4SkCcnRoABNa3PX4Ygobz9MUGAAEC';
  }
  $r_method  = "sendPhoto";
}

elseif($command == '/selfie'){
  $r_photo = 'AgADBAADSK4xG0ywaVP1hNWICi-Q50mMoBoABNHVr46CPIjXgMgEAAEC';
  $r_method  = "sendPhoto";
}


elseif($command == '/piave'){
  $r_text = 'https://www.youtube.com/watch?v=rGw8CSYuiBI';
  $r_method  = "sendMessage";
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

