<?php

require_once __DIR__ . '/../dao/AuthDao.class.php';

class AuthService {
    private $auth_dao;
    public function __construct() {
        $this->auth_dao = new AuthDao();
    }

    public function get_report_by_id($report_id){
        return $this->auth_dao->get_report_by_id($report_id);
    }
}