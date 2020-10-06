<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PublicModel', 'mpublic', true);
    }

    public function index() {
        $data['title'] = "Selamat Datang";
        $data['subjects'] = $this->mpublic->getAllSubject();
        $data['repos'] = $this->mpublic->getLast(10);
        $this->load->template('home', $data);
    }

    public function about() {
        $data['title'] = "Tentang";
        $this->load->template('about', $data);
    }
}
