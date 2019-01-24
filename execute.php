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
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  
  elseif(isset($message['photo'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['audio'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['video'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }
  elseif(isset($message['animation'])){
    $r_text = '`'.json_encode($update).'`';
    $r_method  = "sendMessage";
  }  
  
  elseif($command == '/hash'){
    $r_text = md5_file ('execute.php');
    $r_method  = "sendMessage";
  }

}


/*===================================
            USER COMMANDS
===================================*/
  
  //HELP
if($command == '/help' || $command == '/help@ilprocionebot'){
  $r_text = 
'*/help* - Imparara a comunicare con i procioni!
*/about* - Info su questo procione e sul suo creatore
*/procioni* - Invia foto di procioni
*/selfie* - Ti invio un mio selfie
*/piave* - Per soli veri procioni italiani
*/murloc* - MMMRRRRGGGGHHLLLLLLLLLLGLGLGGLGLGL';
  $r_method  = "sendMessage";
}

//ABOUT
elseif($command == '/about' || $command == '/about@ilprocionebot'){
  $r_text = 
'*Il Procione*
Il Procione è il bot definitivo per i fan e haters dei procioni!

Corretto e mantenuto da @Stefaniscion
Consigli? Suggerimenti? Bug? Scrivi a @Stefaniscion
Puoi trovare il procione sorgente su: https://github.com/Stefaniscion/ilprocione-bot

Versione: `v1.3 Berlusconi Racoon` del _05/12/2018_
Hash: `'.md5_file ('execute.php').'`
_-In memoria di Alex-_';
  $r_method  = "sendMessage";
}

//PROCIONI
elseif($command == '/procioni' || $command == '/procioni@ilprocionebot'){
  $rand_n = rand(1,5);
  if($rand_n == 1){
    $r_photo = 'AgADBAADPq4xG0ywaVNmFWcUiz1zlzB5mhoABHw3FPdcBTNC9M4GAAEC';
  }
  elseif($rand_n == 2){
    $r_photo = 'AgADBAADQK4xG0ywaVOXv1jo2V-0KfSaoBoABFnAsfn6r5UV9cQEAAEC';
  }
  elseif($rand_n == 3){
    $r_photo = 'AgADBAADQ64xG0ywaVMGQliPQqtvugllwxoABEperj8ek4m914oAAgI';
  }
  elseif($rand_n == 4){
    $r_photo = 'AgADBAADRa4xG0ywaVNpoqKTI4pKLeF7mhoABKwBCNR2e2FRG9AGAAEC';
  }
  elseif($rand_n == 5){
    $r_photo = 'AgADBAADRq4xG0ywaVN_f3LbmbI4SkCcnRoABNa3PX4Ygobz9MUGAAEC';
  }
  $r_method  = "sendPhoto";
  
  //rand debug
  //$r_text = $r_text . ' `' . $rand_n . '`';
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

//MURLOC
elseif($command == '/murloc' || $command == '/murloc@ilprocionebot'){
  $r_audio = 'CQADBAADMwUAApYfQFB_en1QSlF4ywI';
  $r_caption = 'MMMRRRRGGGGHHLLLLLLLLLLGLGLGGLGLGL';
  $r_method  = "sendAudio";
}

elseif($command == '/getcommand' || $command == '/getcommand@ilprocionebot'){
  $r_text = $command;
  $r_method  = "sendMessage";
}

/*===================================
              LISTENER
===================================*/
//PRESIDENTE LISTENER
elseif(strpos($command,'presidente')!==false){
  $rand_n = rand(1,4);
  if($rand_n == 1){
    $r_text = 'Presidente?';
    $r_method  = "sendMessage";
  }
  elseif($rand_n == 2){
    $r_text = 'Presidente...? Presidente?';
    $r_method  = "sendMessage";
  }
  elseif($rand_n == 3){
    $r_text = 'P-presidente...?';
    $r_method  = "sendMessage";
  }
  elseif($rand_n == 4){  
    $r_photo = 'AgADBAADR7AxG__UMFDThZrk1XivgTD5mxoABFZdsyzLT4p6gG4HAAEC';
    $r_method  = "sendPhoto";
  }
  
  //rand debug
  //$r_text = $r_text . ' `' . $rand_n . '`';
}

//BERLUSCONI LISTENER
elseif(strpos($command,'berlusconi')!==false){
  $rand_n = rand(1,4);
  if($rand_n == 1){
    $r_text = 'Basta berlusconi! BASTAAAA!';
    $r_method  = "sendMessage";
  }
  elseif($rand_n == 2){
    $r_animation = 'CgADBAADuwUAAh-UiFC4ww6XsJ2IcwI';
    $r_caption = 'Ma basta Berlusconi... basta! Se ti avessi fra le mani...!';
    $r_method  = "sendAnimation";
  }
  elseif($rand_n == 3){
    $r_text = 'BASTA BERLUSCONI! BASTAAAAAAH!';
    $r_method  = "sendMessage";
  }
  elseif($rand_n == 4){
    $r_text = 'Amnistia tua madre quella troia!';
    $r_method  = "sendMessage";
  }
  
  //rand debug
  //$r_text = $r_text . ' `' . $rand_n . '`';
}

/*===================================
              RESPONSE 
===================================*/
header("Content-Type: application/json");

$parameters = array(
                    'chat_id' =>  $chatId, 
                    'parse_mode' => 'Markdown'
                   );

if($r_text){
  $parameters["text"] = $r_text;
}
if($r_photo){
  $parameters["photo"] = $r_photo;
}
if($r_audio){
  $parameters["audio"] = $r_audio;
}
if($r_animation){
  $parameters["animation"] = $r_animation;
}
if($r_caption){
  $parameters["caption"] = $r_caption;
}

//$parameters["method"] = $r_method;

$result = Request::sendMessage($parameters);

echo json_encode($parameters);

