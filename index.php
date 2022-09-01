<?php
    //Parameters from Server-to-Server OAuth App Type required for Access Token generation
    $accountid = '<<ACCOUNT_ID>>';
    $clientid = '<<CLIENT_ID>>';
    $secret = '<<CLIENT_SECRET>>';
    
    //Access Token URL
    $url = "https://zoom.us/oauth/token?grant_type=account_credentials&account_id=" . $accountid;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(        
        'grant_type'    => 'client_credentials'
    )));
    
    //Client Authorization
    $headers[] = "Authorization: Basic " . base64_encode($clientid . ":" . $secret);
    //Content-Type
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $data = curl_exec($ch);
    $auth = json_decode($data, true);
    
    var_dump( $auth );
?>