<?php

require_once __DIR__ . '/BaseDao.class.php';

class ReportDao extends BaseDao {
    public function __construct() {
        parent::__construct('report');
    }

    public function add_report($report) {
        return $this->insert('report', $report);
    }

    public function get_report_by_id($report_id) {
        return $this->query_unique(
            "SELECT * FROM report WHERE id = :id",
            ['id' => $report_id]
        );
    }

    public function get_all_reports() {
        return $this->query(
            "SELECT * FROM report",
            []
        );
    }

    public function update_report($report_id, $report_data) {
        return $this->execute(
            "UPDATE report SET title = :title, description = :description WHERE id = :id",
            [
                'title' => $report_data['title'],
                'description' => $report_data['description'],
                'id' => $report_id
            ]
        );
    }

    public function delete_report($report_id) {
        return $this->execute(
            "DELETE FROM report WHERE id = :id",
            ['id' => $report_id]
        );
    }

}

?>
