<?php
require_once __DIR__ . '/rest/services/wantedService.class.php';
$payload=array();
parse_str($_SERVER['QUERY_STRING'],$payload);
if($payload["id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'Id is missing']));
}

$wanted_service = new WantedService();
$wanted = $wanted_service-> delete_wanted($payload['id']);
echo json_encode(['data'=> $wanted]);