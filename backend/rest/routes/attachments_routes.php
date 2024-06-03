<?php

require_once __DIR__ . '/../services/attachmentService.class.php';

Flight::set('attachment_service', new AttachmentService());

/**
 * @OA\Post(
 *     path="/attachments/add",
 *     summary="Add a new attachment",
 *     description="Adds a new attachment to the system.",
 *     operationId="addAttachment",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Attachment object",
 *         @OA\JsonContent(ref="#/components/schemas/Attachment")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Attachment added successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Attachment added successfully"),
 *             @OA\Property(property="data", type="object", ref="#/components/schemas/Attachment")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="string", example="Filename and file path are required.")
 *         )
 *     )
 * )
 */
Flight::route('POST /attachments/add', function() {
    $payload = Flight::request()->data->getData();

    if (!isset($payload['filename']) || !isset($payload['file_path'])) {
        Flight::halt(400, "Filename and file path are required.");
    }

    $attachment = [
        'filename' => $payload['filename'],
        'file_path' => $payload['file_path'],
    ];

    $attachment = Flight::get('attachment_service')->add_attachment($attachment);

    Flight::json(['message' => "Attachment added successfully", 'data' => $attachment]);
});

/**
 * @OA\Get(
 *     path="/attachments/{attachment_id}",
 *     summary="Get attachment by ID",
 *     description="Gets an attachment by its ID.",
 *     operationId="getAttachmentById",
 *     @OA\Parameter(
 *         name="attachment_id",
 *         in="path",
 *         description="ID of the attachment to retrieve",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Attachment retrieved successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Attachment")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Attachment not found"
 *     )
 * )
 */
Flight::route('GET /attachments/@attachment_id', function($attachment_id) {
    $attachment = Flight::get('attachment_service')->get_attachment_by_id($attachment_id);

    if (!$attachment) {
        Flight::halt(404, "Attachment not found");
    }

    Flight::json($attachment);
});

/**
 * @OA\Get(
 *     path="/attachments",
 *     summary="Get all attachments",
 *     description="Gets all attachments stored in the system.",
 *     operationId="getAllAttachments",
 *     @OA\Response(
 *         response=200,
 *         description="Attachments retrieved successfully",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Attachment"))
 *     )
 * )
 */
Flight::route('GET /attachments', function() {
    $attachments = Flight::get('attachment_service')->get_all_attachments();

    Flight::json($attachments);
});

/**
 * @OA\Put(
 *     path="/attachments/update/{attachment_id}",
 *     summary="Update an attachment",
 *     description="Updates an existing attachment.",
 *     operationId="updateAttachment",
 *     @OA\Parameter(
 *         name="attachment_id",
 *         in="path",
 *         description="ID of the attachment to update",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Updated attachment object",
 *         @OA\JsonContent(ref="#/components/schemas/Attachment")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Attachment updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Attachment updated successfully"),
 *             @OA\Property(property="data", type="object", ref="#/components/schemas/Attachment")
 *         )
 *     )
 * )
 */
Flight::route('PUT /attachments/update/@attachment_id', function($attachment_id) {
    $payload = Flight::request()->data->getData();

    $updated_attachment = Flight::get('attachment_service')->update_attachment($attachment_id, $payload);

    Flight::json(['message' => "Attachment updated successfully", 'data' => $updated_attachment]);
});

/**
 * @OA\Delete(
 *     path="/attachments/delete/{attachment_id}",
 *     summary="Delete an attachment",
 *     description="Deletes an attachment from the system.",
 *     operationId="deleteAttachment",
 *     @OA\Parameter(
 *         name="attachment_id",
 *         in="path",
 *         description="ID of the attachment to delete",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Attachment deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Attachment deleted successfully")
 *         )
 *     )
 * )
 */
Flight::route('DELETE /attachments/delete/@attachment_id', function($attachment_id) {
    Flight::get('attachment_service')->delete_attachment($attachment_id);

    Flight::json(['message' => "Attachment deleted successfully"]);
});

?>
