<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AuthModel extends CI_Model {
    private $tabelUser = 'user';

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function checkUser($username, $password) {
        $query = $this->db->get_where($this->tabelUser, ['username' => strtolower($username), 'password' => $password], $limit = 1);
        // echo $this->db->last_query();exit;
        return $query;
    }

    public function getUser($userid) {
        $query = $this->db->get_where($this->tabelUser, ['user_id' => $userid], $limit = 1);
        return $query->row();
    }

    public function logout() {
        $this->session->unset_userdata(['username' => '', 'login' => false]);
        $this->session->sess_destroy();
    }
}
