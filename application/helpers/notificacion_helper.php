<?php

 function getSslPage($url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_REFERER,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function sendReport($texto){
    $apiToken = "806930563:AAGBE46VrW6vElypAjvJqDvF4vrTkmv04ec";

    $data = [
        'chat_id' => '@tuvotoRD',
        'text' => "{$texto}"
    ];
    
    $response = getSslPage  ("https://api.telegram.org/bot$apiToken/sendMessage?" 
    . http_build_query($data) );// Do what you want with res
}