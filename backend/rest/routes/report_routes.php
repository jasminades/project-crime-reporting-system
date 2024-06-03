<?php

require_once __DIR__ . '/../services/reportService.class.php';
require_once __DIR__ . '/../dao/reportDao.class.php';


Flight::set('reportService', new ReportService());

/**
 * @OA\Post(
 *     path="/reports/add",
 *     summary="Add a new report",
 *     tags={"reports"},
 *     description="Adds a new report to the system.",
 *     operationId="addReport",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Report object",
 *         @OA\JsonContent(ref="assets/json/reports.json")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Report added successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Report added successfully"),
 *             @OA\Property(property="data", type="object", ref="assets/json/reports.json")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Description and date are required.")
 *         )
 *     )
 * )
 */
Flight::route('POST /reports/add', function() {
    $payload = Flight::request()->data->getData();

    if (!isset($payload['description']) || !isset($payload['date'])) {
        Flight::halt(400, "Description and date are required.");
    }

    $report = [
        'description' => $payload['description'],
        'date' => $payload['date'],
    ];

    $report = Flight::get('reportService')->add_report($report);

    Flight::json(['message' => "Report added successfully", 'data' => $report]);
});

/**
 * @OA\Get(
 *     path="/reports/{report_id}",
 *     summary="Get report by ID",
 *     tags={"reports"},
 *     description="Gets a report by its ID.",
 *     operationId="getReportById",
 *     @OA\Parameter(
 *         name="report_id",
 *         in="path",
 *         description="ID of the report to retrieve",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Report retrieved successfully",
 *         @OA\JsonContent(ref="assets/json/reports.json")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Report not found"
 *     )
 * )
 */
Flight::route('GET /reports/@report_id', function($report_id) {
    $report = Flight::get('reportService')->get_report_by_id($report_id);

    if (!$report) {
        Flight::halt(404, "Report not found");
    }

    Flight::json($report);
});

/**
 * @OA\Get(
 *     path="/reports",
 *     summary="Get all reports",
 *     tags={"reports"},
 *     description="Gets all reports stored in the system.",
 *     operationId="getAllReports",
 *     @OA\Response(
 *         response=200,
 *         description="Reports retrieved successfully",
 *         @OA\JsonContent(type="array", @OA\Items(ref="assets/json/reports.json"))
 *     )
 * )
 */
Flight::route('GET /reports', function() {
    $reports = Flight::get('reportService')->get_all_reports();
    Flight::json($reports);
});;

/**
 * @OA\Put(
 *     path="/reports/update/{report_id}",
 *     summary="Update a report",
 *     tags={"reports"},
 *     description="Updates an existing report.",
 *     operationId="updateReport",
 *     @OA\Parameter(
 *         name="report_id",
 *         in="path",
 *         description="ID of the report to update",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated report object",
 *         @OA\JsonContent(ref="assets/json/reports.json")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Report updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Report updated successfully"),
 *             @OA\Property(property="data", type="object", ref="assets/json/reports.json")
 *         )
 *     )
 * )
 */
Flight::route('PUT /reports/update/@report_id', function($report_id) {
    $payload = Flight::request()->data->getData();

    $updated_report = Flight::get('reportService')->update_report($report_id, $payload);

    Flight::json(['message' => "Report updated successfully", 'data' => $updated_report]);
});

/**
 * @OA\Delete(
 *     path="/reports/delete/{report_id}",
 *     summary="Delete a report",
 *     tags={"reports"},
 *     description="Deletes a report from the system.",
 *     operationId="deleteReport",
 *     @OA\Parameter(
 *         name="report_id",
 *         in="path",
 *         description="ID of the report to delete",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Report deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Report deleted successfully")
 *         )
 *     )
 * )
 */
Flight::route('DELETE /reports/delete/@report_id', function($report_id) {
    Flight::get('reportService')->delete_report($report_id);
    Flight::json(['message' => "Report deleted successfully"]);
});

/**
 * @OA\Get(
 *     path="/reports/info",
 *     tags={"reports"},
 *     summary="Get logged in report information",
 *     @OA\Response(
 *         response=200,
 *         @OA\JsonContent(type="array", @OA\Items(ref="assets/json/reports.json"))
 *         )
 *     )
 * )
 */
Flight::route('GET /info', function() {
    Flight::json(Flight::get('report'), 200);
});


?>
