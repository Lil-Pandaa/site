<?php

function getRecentVersions($game, $software) {

    $url = "https://serverjars.com/api/fetchAll/$game/$software/5";


    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    $decoded_json = json_decode($resp);

    $data = $decoded_json->response;
    $versions = [];
    $downloads = [];
    foreach ($data as $obj) {
      $versions[] = $obj->version;
      $downloads[] = "https://serverjars.com/api/fetchJar/$game/$software/$obj->version";
    }

     echo json_encode(array(
      "info" => array(
        "state" => $decoded_json->status,
        "software" => $software,
      ),
      "results" => array(
         "latest" => $versions[0],
         "count" => count($versions),
         "versions" => $versions, 
         "downloads" => $downloads
       )
     ));

}