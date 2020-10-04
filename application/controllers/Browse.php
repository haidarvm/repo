<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller {

	public function index()
	{
		$this->load->view('browse');
	}
}
