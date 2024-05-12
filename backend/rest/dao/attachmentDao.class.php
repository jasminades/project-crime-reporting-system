<?php

require_once __DIR__ . '/BaseDao.class.php';

class AttachmentDao extends BaseDao {
    public function __construct() {
        parent::__construct('attachment');
    }

    public function add_attachment($attachment) {
        return $this->insert('attachment', $attachment);
    }

    public function get_attachment_by_id($attachment_id) {
        return $this->query_unique(
            "SELECT * FROM attachment WHERE id = :id",
            ['id' => $attachment_id]
        );
    }

    public function get_all_attachments() {
        return $this->query(
            "SELECT * FROM attachment",
            []
        );
    }

    public function update_attachment($attachment_id, $attachment_data) {
        return $this->execute(
            "UPDATE attachment SET name = :name, path = :path WHERE id = :id",
            [
                'name' => $attachment_data['name'],
                'path' => $attachment_data['path'],
                'id' => $attachment_id
            ]
        );
    }

    public function delete_attachment($attachment_id) {
        return $this->execute(
            "DELETE FROM attachment WHERE id = :id",
            ['id' => $attachment_id]
        );
    }

}

?>
