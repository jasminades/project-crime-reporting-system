<?php

require_once __DIR__ . '/../services/reportService.class.php';

Flight::set('report_service', new ReportService());

Flight::route('POST /reports/add', function() {
    $payload = Flight::request()->data->getData();

    if (!isset($payload['description']) || !isset($payload['date'])) {
        Flight::halt(400, "Description and date are required.");
    }

    $report = [
        'description' => $payload['description'],
        'date' => $payload['date'],
    ];

    $report = Flight::get('report_service')->add_report($report);

    Flight::json(['message' => "Report added successfully", 'data' => $report]);
});

Flight::route('GET /reports/@report_id', function($report_id) {
    $report = Flight::get('report_service')->get_report_by_id($report_id);

    if (!$report) {
        Flight::halt(404, "Report not found");
    }

    Flight::json($report);
});

Flight::route('GET /reports', function() {
    $reports = Flight::get('report_service')->get_all_reports();

    Flight::json($reports);
});

Flight::route('PUT /reports/update/@report_id', function($report_id) {
    $payload = Flight::request()->data->getData();

    $updated_report = Flight::get('report_service')->update_report($report_id, $payload);

    Flight::json(['message' => "Report updated successfully", 'data' => $updated_report]);
});

Flight::route('DELETE /reports/delete/@report_id', function($report_id) {
    Flight::get('report_service')->delete_report($report_id);

    Flight::json(['message' => "Report deleted successfully"]);
});

?>
