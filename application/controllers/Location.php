<?php

class Location extends CI_Controller {
	var $API = '';

	public function __construct()
	{
		parent::__construct();
		$this->API="http://localhost:8080/api/v1/locations";
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$page = $this->uri->segment(3);

		$ch = curl_init();
		if (empty($page) || !ctype_digit($page)) {
			$page = 0;
			curl_setopt($ch, CURLOPT_URL, $this->API);
		} else {
			curl_setopt($ch, CURLOPT_URL, $this->API . '?start=' . $page);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$responseData = json_decode($response);

		$config['base_url'] = 'http://localhost/training-intern/location/index';
		$config['total_rows'] = $responseData->meta->totalData;
		$config['per_page'] = 10;

		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$data['locations'] = $responseData->data;
		$data['start'] = $page;

		$this->load->view('templates/header', ['title' => 'Location Management']);
		$this->load->view('location/index', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'country' => $this->input->post('country'),
			'province' => $this->input->post('province'),
			'city' => $this->input->post('city')
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$response = curl_exec($ch);
		curl_close($ch);

		$this->session->set_flashdata('success', 'Location has been created.');
		redirect('location');
	}

	public function create()
	{
		$this->load->view('templates/header', ['title' => 'Create Location']);
		$this->load->view('location/create');
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$location = json_decode($response);

		$data['location'] = $location->data;

		$this->load->view('templates/header', ['title' => 'Edit Location']);
		$this->load->view('location/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update($id)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'country' => $this->input->post('country'),
			'province' => $this->input->post('province'),
			'city' => $this->input->post('city')
		);

		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$response = curl_exec($ch);
		curl_close($ch);

		$this->session->set_flashdata('success', 'Location has been updated.');
		redirect('location');
	}

	public function delete($id)
	{
		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$this->session->set_flashdata('success', 'Location has been deleted.');
		redirect('location');
	}
}
