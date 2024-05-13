<?php
require_once __DIR__ . '/rest/services/missingService.class.php';

$missing_service = new MissingService();
$all_missing = $missing_service-> get_all_missing_persons();
echo json_encode(['data'=> $all_missing]);