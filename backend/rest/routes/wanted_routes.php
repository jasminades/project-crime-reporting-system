<?php

require_once __DIR__ . '/../services/WantedService.class.php';

Flight::set('wanted_service', new WantedService());

Flight::route('POST /wanted/add', function() {
    $payload = Flight::request()->data->getData();

    // Check if required fields are present
    if (!isset($payload['name']) || !isset($payload['crime'])) {
        Flight::halt(400, "Name and crime are required for a wanted person report.");
    }

    $wanted = [
        'name' => $payload['name'],
        'crime' => $payload['crime'],
        // Add other fields as needed
    ];

    $wanted = Flight::get('wanted_service')->add_wanted($wanted);

    Flight::json(['message' => "Wanted person report added successfully", 'data' => $wanted]);
});

Flight::route('GET /wanted/@wanted_id', function($wanted_id) {
    $wanted = Flight::get('wanted_service')->get_wanted_by_id($wanted_id);

    if (!$wanted) {
        Flight::halt(404, "Wanted person report not found");
    }

    Flight::json($wanted);
});

Flight::route('GET /wanted', function() {
    $wantedPersons = Flight::get('wanted_service')->get_all_wanted();

    Flight::json($wantedPersons);
});

Flight::route('PUT /wanted/update/@wanted_id', function($wanted_id) {
    $payload = Flight::request()->data->getData();

    $updatedWanted = Flight::get('wanted_service')->update_wanted($wanted_id, $payload);

    Flight::json(['message' => "Wanted person report updated successfully", 'data' => $updatedWanted]);
});

Flight::route('DELETE /wanted/delete/@wanted_id', function($wanted_id) {
    Flight::get('wanted_service')->delete_wanted($wanted_id);

    Flight::json(['message' => "Wanted person report deleted successfully"]);
});

?>
