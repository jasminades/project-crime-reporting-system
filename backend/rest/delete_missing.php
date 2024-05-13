<?php
require_once __DIR__ . '/rest/services/missingService.class.php';
$payload=array();
parse_str($_SERVER['QUERY_STRING'],$payload);
if($payload["id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'Id is missing']));
}

$missing_service = new MissingService();
$missing = $missing_service-> delete_missing_person($payload['id']);
echo json_encode(['data'=> $missing]);