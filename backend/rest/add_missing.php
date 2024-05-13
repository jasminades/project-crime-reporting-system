<?php
require_once __DIR__ . '/rest/services/missingDao.class.php';
$payload=json_decode(file_get_contents("php://input"),true);
if($payload["missing_id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'User id is missing']));
}
if($payload["tour_id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'Missing Person id is missing']));
}
$tour_service = new MissingService();
$tour_service-> add_missing_person($payload['missing_id']);
echo json_encode(['message'=>'You have successfully added a new missing person']);