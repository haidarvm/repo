<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PublicModel', 'mpublic', true);
    }

    public function index() {
        $data['title'] = "Browse";
        $data['types'] = $this->mpublic->getAllType();
        $data['subjects'] = $this->mpublic->getAllSubject();
        $this->load->template('search', $data);
    }

    public function post() {
        $post = $this->input->post();
        $data['title'] = "Result";
        $data['results'] = $this->mpublic->search($post);
        $this->load->template('result', $data);
    }
}
