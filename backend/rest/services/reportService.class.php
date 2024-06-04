// reportService.class.php
<?php

require_once __DIR__ . '/../dao/reportDao.class.php';
=======


require_once __DIR__ . '/../dao/ReportDao.class.php';



class ReportService {
    private $report_dao;


    public function __construct() {
        $this->report_dao = new ReportDao();
    }

    public function get_all_reports() {
        return $this->report_dao->get_all_reports();
    }
    public function add_report($report) {
        $report['password'] = password_hash($report['password'], PASSWORD_BCRYPT);
        return $this->report_dao->add_report($report);
    }

    public function get_report_by_id($report_id) {
        return $this->report_dao->get_report_by_id($report_id);
    }

    public function update_report($report_id, $report_data) {
        return $this->report_dao->update_report($report_id, $report_data);
    }

    public function delete_report($report_id) {
        return $this->report_dao->delete_report($report_id);
    }
}
?>
