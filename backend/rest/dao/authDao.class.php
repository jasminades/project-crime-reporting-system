<?php
require_once __DIR__ . '/BaseDao.class.php';

class AuthDao extends BaseDao {
    public function __construct() {
        parent::__construct('reports');
    }

    public function get_report_by_id($report_id) {
        $query = "SELECT *
                  FROM reports
                  WHERE id = :report_id";
        return $this->query_unique($query, ['report_id' => $report_id]);
    }
}
?>
