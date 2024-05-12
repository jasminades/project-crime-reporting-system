<?php
require_once __DIR__ . '/rest/services/wantedDao.class.php';
$payload=json_decode(file_get_contents("php://input"),true);
if($payload["user_id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'User id is missing']));
}
if($payload["wanted_id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'Wanted Person id is missing']));
}
$tour_service = new WantedService();
$tour_service-> add_wanted($payload['wanted_id']);
echo json_encode(['message'=>'You have successfully added a new wanted criminal']);