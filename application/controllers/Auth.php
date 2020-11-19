<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel', 'mauth', true);
    }

    public function index() {
        $data['title'] = 'Adnin Login';
        $this->load->template('login', $data);
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $query = $this->mauth->checkUser($username, $password);
        if (1 == $query->num_rows()) {
            $user = $query->row();
            $data = ['user_id' => $user->user_id, 'username' => $username, 'login' => true, 'fullname' => $user->fullname];
            $this->session->set_userdata($data);
            $this->session->sess_expiration = 144000;
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('message', 'Username atau password salah');
            redirect('auth');
        }
    }

    public function logout() {
        $this->mauth->logout();
        redirect('auth');
    }

    public function infoc() {
        echo APPPATH;
        echo CI_VERSION;
    }


    public function do_upload() {
        $config['upload_path'] = imgFullPath();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 3024;
        $config['max_height'] = 3000;
        $config['file_name'] = uniqeID();
        $this->load->library('upload', $config);
        print_r($this->upload->do_upload());
        if (!$this->upload->do_upload('filename')) {
            $error = ['error' => $this->upload->display_errors()];
            print_r($error);
        } else {
            $data = ['upload_data' => $this->upload->data()];
            $this->do_resize($data['upload_data']['file_name']);
            print_r($data);
            return $data;
        }
    }

    public function img_upload() {
        $do_upload = $this->do_upload();
        // print_r($do_upload);exit;
    }

    public function gitpull() {
        $url = realpath(__DIR__);
        $arr = explode('/', $url);
        $userfolder = $arr[2];
        putenv('PATH=' . getenv('PATH') . ':' . $url);
        exec('/usr/bin/git pull 2>&1', $output);
        echo json_encode($output);
    }

    public function gitpullp() {
        $url = realpath(__DIR__);
        $arr = explode('/', $url);
        $userfolder = $arr[2];
        putenv('PATH=' . getenv('PATH') . ':' . $url);
        exec('/usr/bin/ssh-keygen -t rsa 2>&1', $output);
        echo json_encode($output);
    }

    public function gittest() {
        $url = realpath(__DIR__);
        $arr = explode('/', $url);
        $userfolder = $arr[2];
        putenv('PATH=' . getenv('PATH') . ':' . $url);
        exec('/usr/bin/ssh -vT git@gitlab.com 2>&1', $output);
        echo json_encode($output);
    }

    public function get_future() {
        $future = $this->mauth->getFuturePosts();
        if (!empty($future)) {
            foreach ($future as $row) {
                echo $row->post_title . ' ' . $row->post_date;
                echo $this->mauth->setPublishFuturePosts($row->ID);
            }
        }
    }

    public function list_col() {
        $data = $this->mauth->listCol();
        // print_r($data);exit;
        foreach ($data as $row) {
            echo $row->COLUMN_NAME . ':string ';
        }
    }

    public function sendmail() {
        $this->load->library('email');

        $this->email->initialize([
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'smtp_port' => 587,
            'crlf' => "\r\n",
            'newline' => "\r\n",
        ]);

        $this->email->from('haidar@haidar.id', 'Haidar Marie');
        $this->email->to('haidarvm@gmail.com');
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');
        $this->email->subject('Email Test Haidarvm');
        $this->email->message('Testing the email class Haidarvm Check this please.');
        $this->email->send();

        echo $this->email->print_debugger();
    }
}
