<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AdminModel extends CI_Model {
    private $tb_repo = 'repo';
    private $tb_type = 'type';
    private $tb_subject = 'subject';
    private $tb_files = 'files';

    public function __construct() {
        parent::__construct();
    }

    public function getAllType() {
        return $this->db->get($this->tb_type)->result();
    }

    public function getAllSubject() {
        return $this->db->get($this->tb_subject)->result();
    }

    public function insertRepo($data) {
        return $this->db->insert($this->tb_repo, $data);
    }

    public function insertFile($data) {
        return $this->db->insert($this->tb_files, $data);
    }
}