<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PublicModel', 'mpublic', true);
    }

    public function index() {
        $data['title'] = "Repository Fisip UNLA";
        $data['subjects'] = $this->mpublic->getAllSubject();
        $data['repos'] = $this->mpublic->getLast(3);
        $this->load->template('home', $data);
    }
}
