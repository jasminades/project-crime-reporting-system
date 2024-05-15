<?php
require_once __DIR__ . '/rest/services/reportService.class.php';
$payload=array();
parse_str($_SERVER['QUERY_STRING'],$payload);
if($payload["id"]==""){
    header('HTTP/1.1 500 Bad Request');
    die(json_encode(['error'=>'Id is missing']));
}

$report_service = new ReportService();
$report = $report_service-> delete_report($payload['id']);
echo json_encode(['data'=> $report]);