<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Browse extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PublicModel', 'mpublic', true);
    }

    public function index() {
        $data['title'] = "Browse";
        $data['subjects'] = $this->mpublic->getAllSubject();
        $this->load->template('browse', $data);
    }

    public function view($repo_id) {
        $data['title'] = "Browse";
        $data['repo'] = $this->mpublic->getRepo($repo_id);
        $data['files'] = $this->mpublic->getFiles($repo_id);
        $this->load->template('view', $data);
    }

    public function subject($subject_id) {
        $data['title'] = "Subject";
        $data['repos'] = $this->mpublic->getBy("subject_id", $subject_id);
        $this->load->template('by', $data);
    }

    public function type($type_id) {
        $data['title'] = "Type";
        $data['repos'] = $this->mpublic->getBy("type_id",$type_id);
        $this->load->template('by', $data);
    }

    public function year($year) {
        $data['title'] = "Year";
        $data['repos'] = $this->mpublic->getByYear($year);
        $this->load->template('by', $data);
    }

    public function download($file_id) {
        $this->load->helper('download');
        $file = $this->mpublic->getFile($file_id);
        $filefull = filePaths().$file->full_path.$file->filename;
        echo $filefull;
        force_download($filefull, NULL);
    }

}
