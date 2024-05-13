<?php

require_once __DIR__ . '/../services/AttachmentService.class.php';

Flight::set('attachment_service', new AttachmentService());

Flight::route('POST /attachments/add', function() {
    $payload = Flight::request()->data->getData();

    // Check if required fields are present
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

Flight::route('GET /attachments/@attachment_id', function($attachment_id) {
    $attachment = Flight::get('attachment_service')->get_attachment_by_id($attachment_id);

    if (!$attachment) {
        Flight::halt(404, "Attachment not found");
    }

    Flight::json($attachment);
});

Flight::route('GET /attachments', function() {
    $attachments = Flight::get('attachment_service')->get_all_attachments();

    Flight::json($attachments);
});

Flight::route('PUT /attachments/update/@attachment_id', function($attachment_id) {
    $payload = Flight::request()->data->getData();

    $updated_attachment = Flight::get('attachment_service')->update_attachment($attachment_id, $payload);

    Flight::json(['message' => "Attachment updated successfully", 'data' => $updated_attachment]);
});

Flight::route('DELETE /attachments/delete/@attachment_id', function($attachment_id) {
    Flight::get('attachment_service')->delete_attachment($attachment_id);

    Flight::json(['message' => "Attachment deleted successfully"]);
});

?>
