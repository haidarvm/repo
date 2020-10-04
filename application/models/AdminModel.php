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

    public function insertDraft() {
        $data = ["user_id" => 1];
        $this->db->insert($this->tb_repo, $data);
        return $this->db->insert_id();
    }

    public function getLastDraft() {
        return $this->db->get_where($this->tb_repo, ['user_id' => 1, 'title' => NULL])->row();
    }

    public function getAllType() {
        return $this->db->get($this->tb_type)->result();
    }

    public function getRepo($id) {
        return $this->db->get_where($this->tb_repo, ['repo_id' => $id])->row();
    }

    public function getAllSubject() {
        return $this->db->get($this->tb_subject)->result();
    }

    public function insertRepo($data) {
        return $this->db->insert($this->tb_repo, $data);
    }

    public function updateRepo($data, $id) {
        return $this->db->update($this->tb_repo, $data, ['repo_id' => $id]);
    }

    public function insertFile($data) {
        return $this->db->insert($this->tb_files, $data);
    }
}