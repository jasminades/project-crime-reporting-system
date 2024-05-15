<?php
require_once __DIR__ . '/rest/services/reportService.class.php';

$reports_service = new ReportService();
$reports = $report_service-> get_all_reports();
echo json_encode(['data'=> $reports]);