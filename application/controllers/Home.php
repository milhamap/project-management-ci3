<?php

class Home extends CI_Controller {
	var $API = '';

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost:8080/api/v1/projects";
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$responseData = json_decode($response);

		$this->load->view('templates/header', ['title' => 'Home']);
		$this->load->view('home/index', ['projects' => $responseData->data]);
		$this->load->view('templates/footer');
	}
}
