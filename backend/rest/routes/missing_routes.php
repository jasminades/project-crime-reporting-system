<?php

require_once __DIR__ . '/../services/MissingService.class.php';

Flight::set('missing_service', new MissingService());

Flight::route('POST /missing/add', function() {
    $payload = Flight::request()->data->getData();

    if (!isset($payload['name']) || !isset($payload['age'])) {
        Flight::halt(400, "Name and age are required for a missing person report.");
    }

    $missing = [
        'name' => $payload['name'],
        'age' => $payload['age'],
    ];

    $missing = Flight::get('missing_service')->add_missing_person($missing);

    Flight::json(['message' => "Missing person report added successfully", 'data' => $missing]);
});

Flight::route('GET /missing/@missing_id', function($missing_id) {
    $missing = Flight::get('missing_service')->get_missing_person_by_id($missing_id);

    if (!$missing) {
        Flight::halt(404, "Missing person report not found");
    }

    Flight::json($missing);
});

Flight::route('GET /missing', function() {
    $missingPersons = Flight::get('missing_service')->get_all_missing_persons();

    Flight::json($missingPersons);
});

Flight::route('PUT /missing/update/@missing_id', function($missing_id) {
    $payload = Flight::request()->data->getData();

    $updatedMissing = Flight::get('missing_service')->update_missing_person($missing_id, $payload);

    Flight::json(['message' => "Missing person report updated successfully", 'data' => $updatedMissing]);
});

Flight::route('DELETE /missing/delete/@missing_id', function($missing_id) {
    Flight::get('missing_service')->delete_missing_person($missing_id);

    Flight::json(['message' => "Missing person report deleted successfully"]);
});

?>
