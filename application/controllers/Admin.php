<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel', 'madmin', true);
    }

    public function index() {
        $getDraft = $this->madmin->getLastDraft();
        $repo_id = !empty($getDraft->repo_id) ? $getDraft->repo_id : $this->madmin->insertDraft();
        redirect("admin/draft/".$repo_id);
    }

    public function draft($id) {
        $data['title'] = "Repository";
        $data['repo_id'] = $id;
        $data['types'] = $this->madmin->getAllType();
        $data['subjects'] = $this->madmin->getAllSubject();
        $this->load->template('repo', $data);
    }

    public function update($id) {
        $data['title'] = "Repository";
        $data['repo_id'] = $id;
        $data['types'] = $this->madmin->getAllType();
        $data['subjects'] = $this->madmin->getAllSubject();
        $data['repo'] = $this->madmin->getRepo($id);
        $this->load->template('repo', $data);
    }

    public function save($repo_id) {
        $data = $this->input->post();
        $data['user_id'] = 1;
        $this->madmin->updateRepo($data, $repo_id);
    }

    public function upload($id) {
        $config['upload_path'] = fileFullPath();
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000;
        $config['max_width'] = 9024;
        $config['max_height'] = 9000;
        $config['file_name'] = uniqeID();
        // $config['url'] = 'testing';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('files')) {
            $error = ['error' => $this->upload->display_errors()];
            echo fileFullPath();
            print_r($error);
            print_r($this->input->post());
        } else {
            $data['post_id'] = $id;
            $data = ['upload_data' => $this->upload->data()];
            $data_ori = [
                'repo_id' => $id,
                'full_path' =>  $data['upload_data']['file_path'],
                'filename' => $data['upload_data']['file_name'],
                'original_name' => $data['upload_data']['client_name'],
                'file_ext' => $data['upload_data']['file_ext'],
                'file_size' => $data['upload_data']['file_size'],
                'file_type' => $data['upload_data']['file_type'],
            ];
            // check if tb img feature not exits post id
            $this->madmin->insertFile($data_ori);
            $data['success'] = true;
            $data['status'] = 200;
            // print_r($data);
            echo json_encode($data);
            // return $data;
        }
    }

}
