<?php

require_once __DIR__ . '/../dao/WantedDao.class.php';

class WantedService {
    private $wanted_dao;

    public function __construct() {
        $this->wanted_dao = new WantedDao();
    }

    public function add_wanted($wanted) {
        return $this->wanted_dao->add_wanted($wanted);
    }

    public function get_wanted_by_id($wanted_id) {
        return $this->wanted_dao->get_wanted_by_id($wanted_id);
    }

    public function get_all_wanted() {
        return $this->wanted_dao->get_all_wanted();
    }

    public function update_wanted($wanted_id, $wanted_data) {
        return $this->wanted_dao->update_wanted($wanted_id, $wanted_data);
    }

    public function delete_wanted($wanted_id) {
        return $this->wanted_dao->delete_wanted($wanted_id);
    }
}

?>
