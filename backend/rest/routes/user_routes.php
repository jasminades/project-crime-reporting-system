<?php

require_once __DIR__ . '/../services/UserService.class.php';



Flight::set('user_service', new UserService());

Flight::route('POST /users/add', function() {
    $payload = Flight::request()->data->getData();

    // Check if required fields are present
    if (!isset($payload['username']) || !isset($payload['password'])) {
        Flight::halt(400, "Username and password are required.");
    }

    $user = [
        'username' => $payload['username'],
        'password' => $payload['password'],
    ];

    $user = Flight::get('userService')->add_user($user);

    Flight::json(['message' => "User added successfully", 'data' => $user]);
});

Flight::route('GET /users/@user_id', function($user_id) {
    $user = Flight::get('user_service')->get_user_by_id($user_id);

    if (!$user) {
        Flight::halt(404, "User not found");
    }

    Flight::json($user);
});

Flight::route('GET /users', function() {
    $users = Flight::get('user_service')->get_all_users();

    Flight::json($users);
});

Flight::route('PUT /users/update/@user_id', function($user_id) {
    $payload = Flight::request()->data->getData();

    $updated_user = Flight::get('user_service')->update_user($user_id, $payload);

    Flight::json(['message' => "User updated successfully", 'data' => $updated_user]);
});

Flight::route('DELETE /users/delete/@user_id', function($user_id) {
    Flight::get('user_service')->delete_user($user_id);

    Flight::json(['message' => "User deleted successfully"]);
});

?>
