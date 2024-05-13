<?php

require_once __DIR__ . '/BaseDao.class.php';

class MissingDao extends BaseDao {
    public function __construct() {
        parent::__construct('missing');
    }

    public function add_missing_person($missing) {
        return $this->insert('missing', $missing);
    }

    public function get_missing_person_by_id($missing_id) {
        return $this->query_unique(
            "SELECT * FROM missing WHERE id = :id",
            ['id' => $missing_id]
        );
    }

    public function get_all_missing_persons() {
        return $this->query(
            "SELECT * FROM missing",
            []
        );
    }

    public function update_missing_person($missing_id, $missing_data) {
        return $this->execute(
            "UPDATE missing SET name = :name, description = :description WHERE id = :id",
            [
                'name' => $missing_data['name'],
                'description' => $missing_data['description'],
                'id' => $missing_id
            ]
        );
    }

    public function delete_missing_person($missing_id) {
        return $this->execute(
            "DELETE FROM missing WHERE id = :id",
            ['id' => $missing_id]
        );
    }

}

?>
