<?php

require_once __DIR__ . '/BaseDao.class.php';

class CrimesDao extends BaseDao {
    public function __construct() {
        parent::__construct('crimes');
    }

    public function add_crime($crime) {
        return $this->insert('crimes', $crime);
    }

    public function get_crime_by_id($crime_id) {
        return $this->query_unique(
            "SELECT * FROM crimes WHERE id = :id",
            ['id' => $crime_id]
        );
    }

    public function get_all_crimes() {
        return $this->query(
            "SELECT * FROM crimes",
            []
        );
    }

    public function update_crime($crime_id, $crime_data) {
        return $this->execute(
            "UPDATE crimes SET name = :name, description = :description WHERE id = :id",
            [
                'name' => $crime_data['name'],
                'description' => $crime_data['description'],
                'id' => $crime_id
            ]
        );
    }

    public function delete_crime($crime_id) {
        return $this->execute(
            "DELETE FROM crimes WHERE id = :id",
            ['id' => $crime_id]
        );
    }

}

?>
