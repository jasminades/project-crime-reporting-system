<?php
require_once __DIR__ . '/rest/services/wantedService.class.php';

$wanted_service = new WantedService();
$allwanted = $wanted_service-> get_all_wanted();
echo json_encode(['data'=> $allwanted]);