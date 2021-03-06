<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class PublicModel extends CI_Model {
    private $tb_repo = 'repo';
    private $tb_type = 'type';
    private $tb_subject = 'subject';
    private $tb_files = 'files';
    private $tb_prodi = 'prodi';

    public function __construct() {
        parent::__construct();
    }

    public function getAllType() {
        return $this->db->get($this->tb_type)->result();
    }

    public function getAllProdi() {
        return $this->db->get($this->tb_prodi)->result();
    }

    public function getRepo($repo_id) {
        $this->db->join($this->tb_prodi, $this->tb_prodi.'.prodi_id = '. $this->tb_repo.'.prodi_id', 'left');
        $this->db->join($this->tb_type, $this->tb_type.'.type_id = '. $this->tb_repo.'.type_id', 'inner');
        $this->db->join($this->tb_subject, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'inner');
        $query = $this->db->get_where($this->tb_repo, [$this->tb_repo.'.repo_id' => $repo_id]);
        return $query->row();
    }

    public function getBy($by, $type) {
        $this->db->join($this->tb_subject, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'inner');
        $this->db->join($this->tb_prodi, $this->tb_prodi.'.prodi_id = '. $this->tb_repo.'.prodi_id', 'left');
        $this->db->order_by('author', 'ASC');
        $query = $this->db->get_where($this->tb_repo, [$this->tb_repo.'.'.$by => $type]);
        return $query->result();
    }

    public function getLast($limit) {
        $this->db->limit($limit);
        $this->db->join($this->tb_prodi, $this->tb_prodi.'.prodi_id = '. $this->tb_repo.'.prodi_id', 'left');
        $this->db->join($this->tb_type, $this->tb_type.'.type_id = '. $this->tb_repo.'.type_id', 'inner');
        $this->db->join($this->tb_subject, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'inner');
        $this->db->order_by('repo_id', 'DESC');
        return $this->db->get($this->tb_repo)->result();
    }

    public function getFiles($repo_id) {
        return $this->db->get_where($this->tb_files, ['repo_id' => $repo_id])->result();
    }

    public function getFile($file_id) {
        return $this->db->get_where($this->tb_files, ['file_id' => $file_id])->row();
    }

    public function getAllByProdi($prodi_id) {
        $this->db->join($this->tb_subject, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'inner');
        $this->db->join($this->tb_prodi, $this->tb_prodi.'.prodi_id = '. $this->tb_repo.'.prodi_id', 'inner');
        $this->db->where('prodi.prodi_id', $prodi_id);
        $query = $this->db->get($this->tb_repo);
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    public function getAllSubject() {
        $this->db->select("subject.subject_id, subject_name, count(repo_id) as total");
        $this->db->join($this->tb_repo, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'left');
        $this->db->group_by($this->tb_subject.".subject_id");
        return $this->db->get($this->tb_subject)->result();
    }

    public function search($data) {
        !empty($data['prodi_id']) ? $this->db->where('prodi_id', $data['prodi_id']) : "";
        !empty($data['title']) ? $this->db->like('title', $data['title']) : "";
        !empty($data['abstract']) ? $this->db->or_like('abstract', $data['abstract']) : "";
        !empty($data['author']) ? $this->db->or_like('author', $data['author']) : "";
        !empty($data['keyword']) ? $this->db->or_like('keyword', $data['keyword']) : "";
        !empty($data['date']) ? $this->db->where('YEAR(date)', $data['date']) : "";
        // $this->db->join($this->tb_prodi, $this->tb_prodi.'.prodi_id = '. $this->tb_repo.'.prodi_id', 'left');
        $this->db->join($this->tb_subject, $this->tb_subject.'.subject_id = '. $this->tb_repo.'.subject_id', 'inner');
        $query = $this->db->get($this->tb_repo);
        // echo $this->db->last_query();exit;
        return $query->result();
    }

    

}