<?php

require_once __DIR__ . '/../dao/MissingDao.class.php';

class MissingService {
    private $missing_dao;

    public function __construct() {
        $this->missing_dao = new MissingDao();
    }

    public function add_missing_person($missing) {
        return $this->missing_dao->add_missing_person($missing);
    }

    public function get_missing_person_by_id($missing_id) {
        return $this->missing_dao->get_missing_person_by_id($missing_id);
    }

    public function get_all_missing_persons() {
        return $this->missing_dao->get_all_missing_persons();
    }

    public function update_missing_person($missing_id, $missing_data) {
        return $this->missing_dao->update_missing_person($missing_id, $missing_data);
    }

    public function delete_missing_person($missing_id) {
        return $this->missing_dao->delete_missing_person($missing_id);
    }
}

?>
