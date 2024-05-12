<?php

require_once __DIR__ . '/../dao/AttachmentDao.class.php';

class AttachmentService {
    private $attachment_dao;

    public function __construct() {
        $this->attachment_dao = new AttachmentDao();
    }

    public function add_attachment($attachment) {
        return $this->attachment_dao->add_attachment($attachment);
    }

    public function get_attachment_by_id($attachment_id) {
        return $this->attachment_dao->get_attachment_by_id($attachment_id);
    }

    public function get_all_attachments() {
        return $this->attachment_dao->get_all_attachments();
    }

    public function update_attachment($attachment_id, $attachment_data) {
        return $this->attachment_dao->update_attachment($attachment_id, $attachment_data);
    }

    public function delete_attachment($attachment_id) {
        return $this->attachment_dao->delete_attachment($attachment_id);
    }
}

?>
