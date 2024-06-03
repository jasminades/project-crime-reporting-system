<?php

require_once __DIR__ . '/../services/UserService.class.php';

Flight::set('user_service', new UserService());

/**
 * @OA\Post(
 *     path="/users/add",
 *     summary="Add a new user",
 * tags = {"users"},    
 *     description="Adds a new user to the system.",
 *     operationId="addUser",
 *     @OA\RequestBody(
 *         required=true,
 *         description="User object",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User added successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User added successfully"),
 *             @OA\Property(property="data", type="object", ref="#/components/schemas/User")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Username and password are required.")
 *         )
 *     )
 * )
 */
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

    $user = Flight::get('user_service')->add_user($user);

    Flight::json(['message' => "User added successfully", 'data' => $user]);
});

/**
 * @OA\Get(
 *     path="/users/{user_id}",
 *     summary="Get user by ID",
 * tags = {"users"},
 *     description="Gets a user by their ID.",
 *     operationId="getUserById",
 *     @OA\Parameter(
 *         name="user_id",
 *         in="path",
 *         description="ID of the user to retrieve",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User retrieved successfully",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 */
Flight::route('GET /users/@user_id', function($user_id) {
    $user = Flight::get('user_service')->get_user_by_id($user_id);

    if (!$user) {
        Flight::halt(404, "User not found");
    }

    Flight::json($user);
});

/**
 * @OA\Get(
 *     path="/users",
 *     summary="Get all users",
 *     description="Gets all users stored in the system.",
 *     operationId="getAllUsers",
 *     @OA\Response(
 *         response=200,
 *         description="Users retrieved successfully",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
 *     )
 * )
 */
Flight::route('GET /users', function() {
    $users = Flight::get('user_service')->get_all_users();

    Flight::json($users);
});

/**
 * @OA\Put(
 *     path="/users/update/{user_id}",
 *     summary="Update a user",
 * tags = {"users"},
 *     description="Updates an existing user.",
 *     operationId="updateUser",
 *     @OA\Parameter(
 *         name="user_id",
 *         in="path",
 *         description="ID of the user to update",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated user object",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User updated successfully"),
 *             @OA\Property(property="data", type="object", ref="#/components/schemas/User")
 *         )
 *     )
 * )
 */
Flight::route('PUT /users/update/@user_id', function($user_id) {
    $payload = Flight::request()->data->getData();

    $updated_user = Flight::get('user_service')->update_user($user_id, $payload);

    Flight::json(['message' => "User updated successfully", 'data' => $updated_user]);
});

/**
 * @OA\Delete(
 *     path="/users/delete/{user_id}",
 *     summary="Delete a user",
 *     tags = {"users"},
 *     description="Deletes a user from the system.",
 *     operationId="deleteUser",
 *     @OA\Parameter(
 *         name="user_id",
 *         in="path",
 *         description="ID of the user to delete",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User deleted successfully")
 *         )
 *     )
 * )
 */
Flight::route('DELETE /users/delete/@user_id', function($user_id) {
    Flight::get('user_service')->delete_user($user_id);

    Flight::json(['message' => "User deleted successfully"]);
});


/**
 * @OA\Get(
 *     path="/users/info",
 *      tags={"users"},
 *      summary = "Get logged in users information",
 *     @OA\Response(
 *         response=200,
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="")
 *         )
 *     )
 * )
 */
Flight::route('GET /info', function() {
    Flight::json(Flight::get('user'),200);
});

?>
