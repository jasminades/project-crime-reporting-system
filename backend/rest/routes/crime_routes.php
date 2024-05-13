<?php

require_once __DIR__ . '/../services/CrimesService.class.php';

Flight::set('crimes_service', new CrimesService());

Flight::route('POST /crimes/add', function() {
    $payload = Flight::request()->data->getData();

    // Check if required fields are present
    if (!isset($payload['crime_type']) || !isset($payload['location'])) {
        Flight::halt(400, "Crime type and location are required.");
    }

    $crime = [
        'crime_type' => $payload['crime_type'],
        'location' => $payload['location'],
        // Add other fields as needed
    ];

    $crime = Flight::get('crimes_service')->add_crime($crime);

    Flight::json(['message' => "Crime added successfully", 'data' => $crime]);
});

Flight::route('GET /crimes/@crime_id', function($crime_id) {
    $crime = Flight::get('crimes_service')->get_crime_by_id($crime_id);

    if (!$crime) {
        Flight::halt(404, "Crime not found");
    }

    Flight::json($crime);
});

Flight::route('GET /crimes', function() {
    $crimes = Flight::get('crimes_service')->get_all_crimes();

    Flight::json($crimes);
});

Flight::route('PUT /crimes/update/@crime_id', function($crime_id) {
    $payload = Flight::request()->data->getData();

    $updated_crime = Flight::get('crimes_service')->update_crime($crime_id, $payload);

    Flight::json(['message' => "Crime updated successfully", 'data' => $updated_crime]);
});

Flight::route('DELETE /crimes/delete/@crime_id', function($crime_id) {
    Flight::get('crimes_service')->delete_crime($crime_id);

    Flight::json(['message' => "Crime deleted successfully"]);
});

?>
