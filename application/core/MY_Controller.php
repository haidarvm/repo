<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin_Controller extends CI_Controller {
    public $post;
    public $user_id;
    public $username;
    public $title;
    public $css;

    public function __construct() {
        parent::__construct();
        if (false == $this->session->userdata('login')) {
            redirect('auth');
        } else {
            $this->title = 'Admin';
            $this->user_id = $this->session->userdata('user_id');
            $this->username = $this->session->userdata('username');
            $this->fullname = $this->session->userdata('fullname');
        }
    }

    public function admin_only() {
        // $admin = [1, 0];
        // if (in_array($this->acl_id, $admin)) {
        //     return true;
        // }
        redirect('/home');
    }
}

class Public_Controller extends CI_Controller {
    public $device;
    public $platform;
    // public $populer;
    public $populerSajabar;
    public $latest;
    public $last_tv;
    public $urif;
    public $css;
    public $javascript;

    public function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers:  Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Credentials: true");
        parent::__construct();
        $this->load->model('HomeModel', 'mhome', true);
        $this->load->model('CategoryModel', 'mcategory', true);
        // echo current_url(); exit;
        $host = $_SERVER['HTTP_HOST'];
        $get_class = $this->router->fetch_class();
        $getMethod = $this->router->fetch_method();
        // echo $this->router->fetch_method(); exit;
        $firstSub = substr($host, 0, strpos($host, '.'));
        $common_method = ['rubrik', 'sajabar', 'read','index','indeks'];
    }

}