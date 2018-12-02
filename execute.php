<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

/*
if(!$update){
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
  
  elseif($command == '/hash'){
    $r_text = md5(file_get_contents(execute.php));
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
  
  //HELP
if($command == '/help' || $command == '/help@ilprocionebot'){
  $r_text = 
'*help* - Imparara a comunicare con i procioni!
*about* - Info su questo procione e sul suo creatore
*procioni* - Invia foto di procioni
*selfie* - Ti invio un mio selfie
*piave* - Per soli veri procioni italiani';
  $r_method  = "sendMessage";
}

//ABOUT
elseif($command == '/about' || $command == '/about@ilprocionebot'){
  $r_text = 
'*Il Procione*
Il Procione è il bot definitivo per gli fan e haters dei procioni!

Corretto e mantenuto da @Stefaniscion
Consigli? Suggerimenti? Bug? Scrivi a @Stefaniscion
Puoi trovare il procione sorgente su: https://github.com/Stefaniscion/ilprocione-bot

Versione: `v1.1 Mr.President Racoon` del _15/11/2018_
_-In memoria di Alex-_';
  $r_method  = "sendMessage";
}

//PROCIONI
elseif($command == '/procioni' || $command == '/procioni@ilprocionebot'){
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

//SELFIE
elseif($command == '/selfie' || $command == '/selfie@ilprocionebot'){
  $r_photo = 'AgADBAADSK4xG0ywaVP1hNWICi-Q50mMoBoABNHVr46CPIjXgMgEAAEC';
  $r_method  = "sendPhoto";
}

//PIAVE
elseif($command == '/piave' || $command == '/piave@ilprocionebot'){
  $r_text = 'https://www.youtube.com/watch?v=rGw8CSYuiBI';
  $r_method  = "sendMessage";
}


/*===================================
              LISTENER
===================================*/
//PRESIDENTE LISTENER
elseif(strpos($command,'presidente')!==false){
  $r_text = 'Presidente?';
  $r_method  = "sendMessage";
}

/*===================================
              RESPONSE 
===================================*/
header("Content-Type: application/json");

$parameters = array(
                    'chat_id' =>  $chatId, 
                    'text' =>  $r_text,
                    'photo' =>  $r_photo,
                    'parse_mode' => 'Markdown'
                   );
$parameters["method"] = $r_method;

echo json_encode($parameters);

