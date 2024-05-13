<?php

require_once __DIR__ . '/../services/AuthService.class.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

Flight::set('auth_service', new AuthService());

Flight::group('/auth', function() {
    
    /**
     * @OA\Post(
     *      path="/auth/login",
     *      tags={"auth"},
     *      summary="Login to system using report id and password",
     *      @OA\Response(
     *           response=200,
     *           description="report data and JWT"
     *      ),
     *      @OA\RequestBody(
     *          description="Report ID - Creditentials",
     *          @OA\JsonContent(
     *              required={"report_id","password"},
     *              @OA\Property(property="report_id", type="number", example="1", description="Report ID"),
     *              @OA\Property(property="password", type="string", example="some_password", description="Patient password")
     *          )
     *      )
     * )
     */
    Flight::route('POST /login', function() {
        $payload = Flight::request()->data->getData();

        $report = Flight::get('auth_service')->get_report_by_id($payload['report_id']);

        if(!$report || !password_verify($payload['password'], $report['password']))
            Flight::halt(500, "Invalid username or password");

        unset($report['password']);
        
        $jwt_payload = [
            'user' => $report,
            'iat' => time(),
            // If this parameter is not set, JWT will be valid for life. This is not a good approach
            'exp' => time() + (60 * 60 * 24) // valid for day
        ];

        $token = JWT::encode(
            $jwt_payload,
            JWT_SECRET,
            'HS256'
        );

        Flight::json(
            array_merge($report, ['token' => $token])
        );
    });

    /**
     * @OA\Post(
     *      path="/auth/logout",
     *      tags={"auth"},
     *      summary="Logout from the system",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Success response or exception if unable to verify jwt token"
     *      ),
     * )
     */
    Flight::route('POST /logout', function() {
        try {
            $token = Flight::request()->getHeader("Authentication");
            if(!$token)
                Flight::halt(401, "Missing authentication header");

            $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));

            Flight::json([
                'jwt_decoded' => $decoded_token,
                'user' => $decoded_token->user
            ]);
        } catch (\Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
    });
});