<?php

/**
 * openapi: 3.0.0
 * @OA\Info(
 *   title="API",
 *   description="Crime Reporting System API",
 *   version="1.0",
 *   @OA\Contact(
 *     email="jasmina.destanovic@stu.ibu.edu.ba",
 *     name="Jasmina Destanovic"
 *   )
 * ),
 * @OA\OpenApi(
 *   @OA\Server(
 *       url=BASE_URL
 *   )
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="ApiKey",
 *     type="apiKey",
 *     in="header",
 *     name="Authentication"
 * )
 */
