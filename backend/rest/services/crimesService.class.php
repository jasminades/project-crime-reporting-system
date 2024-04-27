<?php

require_once __DIR__ . '/../dao/CrimesDao.class.php';

class CrimesService {
    private $crimes_dao;

    public function __construct() {
        $this->crimes_dao = new CrimesDao();
    }

    public function add_crime($crime) {
        return $this->crimes_dao->add_crime($crime);
    }

    public function get_crime_by_id($crime_id) {
        return $this->crimes_dao->get_crime_by_id($crime_id);
    }

    public function get_all_crimes() {
        return $this->crimes_dao->get_all_crimes();
    }

    public function update_crime($crime_id, $crime_data) {
        return $this->crimes_dao->update_crime($crime_id, $crime_data);
    }

    public function delete_crime($crime_id) {
        return $this->crimes_dao->delete_crime($crime_id);
    }
}

?>
