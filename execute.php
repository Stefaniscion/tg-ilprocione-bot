<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

/*
if(!$update){
  exit;
}
*/

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
*/fiume* - Fiume tornerà italiana
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

Versione: `v1.5 Secreet Racoon` del _16/03/2021_
Hash: `'.md5_file ('execute.php').'`
_-La leggenda narra di un programmatore che, spronato da un admin, inserì nel suo bot un comando segreto-_
_-In memoria di Alex-_';
  $r_method  = "sendMessage";
}

elseif($command == '/zajebavati' || $command == '/zajebavati@ilprocionebot'){
  $r_text = 
'http://www.4tube.com/
http://www.8teenxxx.com/
http://www.alotporn.com/
http://www.beeg.com/
http://www.bustnow.com/
http://www.cliphunter.com/
http://www.definebabes.com/
http://www.deviantclip.com/
http://www.drtuber.com/
http://www.empflix.com/
http://www.fantasti.cc/
http://www.fapdu.com/
http://www.freeporn.com/
http://www.freudbox.com/
http://www.fuq.com/
http://www.fux.com/
http://www.grayvee.com/
http://www.hellxx.com/
http://www.hustlertube.com/
http://www.jugy.com/
http://www.jizzhut.com/
http://www.kaktuz.com/
http://www.keezmovies.com/
http://www.kinxxx.com/
http://www.laraporn.com/
http://www.leakedporn.com/
http://www.lovelyclips.com/
http://www.lubetube.com/
http://www.mofosex.com/
http://www.monstertube.com/
http://www.madthumbs.com/
http://www.moviefap.com/
http://www.moviesand.com/
http://www.orgasm.com/
http://www.perfectgirls.net/
http://www.pichunter.com/
http://www.planetsuzy.com/
http://www.porn.com/
http://www.porn-plus.com/
http://www.porncor.com/
http://www.pornhub.com/
http://www.pornrabbit.com/
http://www.porntitan.com/
http://www.pussy.org/
http://www.redtube.com/
http://www.tube8.com/
http://www.xhamster.com/
http://www.xnxx.com/
http://www.xvideos.com/
http://www.youjizz.com/';
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

//FIUME
elseif($command == '/fiume' || $command == '/fiume@ilprocionebot'){
  $rand_n = rand(1,6);
  if($rand_n == 1){
    $r_photo = 'AgADBAAD9q8xG1CF6VKrBGb-VfJ-qiaGKRsABN_k1rlJneEm-skBAAEC';
  }
  elseif($rand_n == 2){
    $r_photo = 'AgADBAAD968xG1CF6VKS00b4r6-xjAtQIBsABGZWejBZKGX8QmYCAAEC';
  }
  elseif($rand_n == 3){
    $r_photo = 'AgADBAAD-a8xG1CF6VJ7RhLlXArpa4guHxsABJdLuwlm2l_1gGsCAAEC';
  }
  elseif($rand_n == 4){
    $r_photo = 'AgADBAAD-68xG1CF6VK5ThUH7X0byhPSLBsABLTQdKcuRvQfIicAAgI';
  }
  elseif($rand_n == 5){
    $r_photo = 'AgADBAAD_K8xG1CF6VIeJcqlnkzI-R3tLBsABBht1fx5L_FP7ycAAgI';
  }
  elseif($rand_n == 6){
    $r_photo = 'AgADBAAD_q8xG1CF6VI9wP3QTxBweZx1wxoABPIJcjrFllGzpZIDAAEC';
  }
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

$parameters["method"] = $r_method;

echo json_encode($parameters);

