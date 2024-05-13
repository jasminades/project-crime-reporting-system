<?php

require_once __DIR__ . '/BaseDao.class.php';

class WantedDao extends BaseDao {
    public function __construct() {
        parent::__construct('wanted');
    }

    public function add_wanted($wanted) {
        return $this->insert('wanted', $wanted);
    }

    public function get_wanted_by_id($wanted_id) {
        return $this->query_unique(
            "SELECT * FROM wanted WHERE id = :id",
            ['id' => $wanted_id]
        );
    }

    public function get_all_wanted() {
        return $this->query(
            "SELECT * FROM wanted",
            []
        );
    }

    public function update_wanted($wanted_id, $wanted_data) {
        return $this->execute(
            "UPDATE wanted SET name = :name, description = :description WHERE id = :id",
            [
                'name' => $wanted_data['name'],
                'description' => $wanted_data['description'],
                'id' => $wanted_id
            ]
        );
    }

    public function delete_wanted($wanted_id) {
        return $this->execute(
            "DELETE FROM wanted WHERE id = :id",
            ['id' => $wanted_id]
        );
    }

}

?>
