<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AdminModel', 'madmin', true);
    }

    public function index() {
        $data['title'] = 'List Repository';
        $data['repos'] = $this->madmin->getAllRepo();
        $data['script'] = 'datatables';
        $this->load->template('repos', $data);
    }

    public function insert() {
        $getDraft = $this->madmin->getLastDraft();
        $repo_id = !empty($getDraft->repo_id) ? $getDraft->repo_id : $this->madmin->insertDraft();
        redirect('admin/draft/' . $repo_id);
    }

    public function draft($id) {
        $data['title'] = 'Repository';
        $data['repo_id'] = $id;
        $data['types'] = $this->madmin->getAllType();
        $data['subjects'] = $this->madmin->getAllSubject();
        $this->load->template('repo', $data);
    }

    public function update($id) {
        $data['title'] = 'Repository';
        $data['repo_id'] = $id;
        $data['types'] = $this->madmin->getAllType();
        $data['subjects'] = $this->madmin->getAllSubject();
        $data['repo'] = $this->madmin->getRepo($id);
        $data['files'] = $this->madmin->getFiles($id);
        $this->load->template('repo', $data);
    }

    public function save($repo_id) {
        $data = $this->input->post();
        $data['user_id'] = 1;
        $this->madmin->updateRepo($data, $repo_id);
        redirect('admin/index');
    }

    public function delete_file($file_id, $repo_id) {
        $this->madmin->deleteFile($file_id);
        redirect('admin/update/' . $repo_id);
    }

    public function batch() {
        $directory = FCPATH.'assets/judul';
        $dir = new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS);
        foreach ($dir as $fileinfo) {
            $indir = new RecursiveDirectoryIterator($directory. '/'. $fileinfo->getFilename(), RecursiveDirectoryIterator::SKIP_DOTS);
                $repo = explode(",",$fileinfo->getFilename());
                $data['author'] = $repo[0];
                $data['title'] = $repo[2];
                $data['subject_id'] = 1;
                $data['type_id'] = 1;
                $data['user_id'] = 1;
                $data['date'] = '2019-10-10';
                // $repo_id = $this->madmin->insertRepo($data);
                echo '<ul>';
                echo "<li>". $fileinfo->getFilename() . '</li>';
                foreach ($indir as $in) {
                    $url = str_replace(' ', '%20' ,base_url().'assets/judul/'.$fileinfo->getFilename().'/'.$in->getFilename());
                    $suff = '_'.uniqeID();
                    $filename = str_replace('%20', ' ' , substr($url, strrpos($url, '/') + 1));
                    $ext = getFileExt($filename);
                    $newname = getFileName($filename). $suff.$ext;
                    // $files = ['filename' => $newname, 'full_path' => filePath(), 'original_name' => $filename, 'file_ext' => $ext, 'repo_id' => $repo_id]; 
                    // $this->madmin->insertFile($files);
                    // copy( $url, FCPATH.'/assets/files/'. filePath() . $newname);
                    echo '<li>' . $url . '</li>';
                }
                echo '</ul>';
        }
    }

    public function copyf() {
        $url = 'http://repo.test/assets/judul/ARYA ANDRIAN NUGROHO, PENGAWASAN MESIN PARKIR OTOMATIS/10. BAB I.docx';
        $suff = '_'.uniqeID();
        $filename = substr($url, strrpos($url, '/') + 1);
        $ext = getFileExt($filename);
        copy( $url, FCPATH.'/assets/test/'. getFileName($filename). $suff.$ext);
    }

    public function upload($id) {
        $config['upload_path'] = fileFullPath();
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000;
        $config['max_width'] = 9024;
        $config['max_height'] = 9000;
        $config['file_name'] = getFileName($_FILES['files']['name']) . '_' . uniqeID();
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
                'full_path' => filePath(),
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
