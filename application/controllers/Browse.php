<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Browse extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PublicModel', 'mpublic', true);
    }

    public function index() {
        $data['title'] = "Repository UNLA";
        $data['by'] = "Subject";
        $data['subjects'] = $this->mpublic->getAllSubject();
        $this->load->template('browse', $data);
    }

    public function latest() {
        $data['title'] = "Repository UNLA";
        $data['results'] = $this->mpublic->getLast(100);
        $this->load->template('result', $data);
    }

    public function view($repo_id) {
        $data['title'] = "Repository UNLA";
        $data['repo'] = $this->mpublic->getRepo($repo_id);
        $data['files'] = $this->mpublic->getFiles($repo_id);
        $this->load->template('view', $data);
    }

    public function subject($subject_id) {
        $data['title'] = "Subject";
        $data['repos'] = $this->mpublic->getBy("subject_id", $subject_id);
        $this->load->template('by', $data);
    }

    public function prodi($prodi_id) {
        $data['title'] = "Prodi";
        $data['repos'] = $this->mpublic->getAllByProdi($prodi_id);
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
        if ($this->session->userdata('login'))  {
            $filefull = filePaths().$file->full_path.$file->filename;
            echo $filefull;
            force_download($filefull, NULL);
        } else {
            if(notallowed($file->filename)) {
                $filefull = filePaths().$file->full_path.$file->filename;
                echo $filefull;
                force_download($filefull, NULL);
            } else {
                echo 'Maaf akses tidak di Izinkan';
            }
        }
    }

    public function previews($file_id) {
        $file = $this->mpublic->getFile($file_id);
        $filefull = filePaths().$file->full_path.$file->filename;
        header('content-type: application/pdf');
        readfile($filefull);
        // echo $filefull;
    }

    public function preview($file_id) {
        $file = $this->mpublic->getFile($file_id);
        $filefull = filePaths().$file->full_path.$file->filename;
        // $pdf = "filename.pdf";
        $im = new Imagick();
        $im->setResolution(300, 300);     //set the resolution of the resulting jpg
        $im->readImage($filefull.'[0]');    //[0] for the first page
        $im->setImageFormat('jpg');
        header('Content-Type: image/jpeg');
        echo $im;
        // $im = new imagick($filefull);
        // $im->scaleImage(0,300); 
        // $im->setIteratorIndex(0);// rewind to first page or image of a multi series
        // $im->setImageCompressionQuality();
        // $im->setImageFormat('jpg');
        // header('Content-Type: image/jpeg');
        // echo $im;
    }

}
