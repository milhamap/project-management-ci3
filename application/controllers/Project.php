<?php
use libraries\Curl;

class Project extends CI_Controller {
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

	public function create()
	{
		$ch = curl_init('http://localhost:8080/api/v1/locations' . '?isFull=true');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$locations = json_decode($response);

		$data['locations'] = $locations->data;

		$this->load->view('templates/header', ['title' => 'Create Project']);
		$this->load->view('project/create', $data);
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$data = [
			'name' => $this->input->post('name'),
			'client' => $this->input->post('client'),
			'startDate' => $this->input->post('startDate'),
			'endDate' => $this->input->post('endDate'),
			'chairPerson' => $this->input->post('chairPerson'),
			'description' => $this->input->post('description'),
			'locationIds' => $this->input->post('locationIds'),
		];

		$ch = curl_init($this->API);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($ch);
		curl_close($ch);

		$this->session->set_flashdata('message', 'Project created successfully');

		redirect('project');
	}

	public function update($id)
	{
		$data = [
			'name' => $this->input->post('name'),
			'client' => $this->input->post('client'),
			'startDate' => $this->input->post('startDate'),
			'endDate' => $this->input->post('endDate'),
			'chairPerson' => $this->input->post('chairPerson'),
			'description' => $this->input->post('description'),
			'newLocationIds' => $this->input->post('locationIds'),
		];

		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($ch);
		curl_close($ch);

		if ($response) {
			$this->session->set_flashdata('message', 'Project updated successfully');
		} else {
			$this->session->set_flashdata('error', 'Failed to update project');
		}

		redirect('project');
	}

	public function index()
	{
		$page = $this->uri->segment(3);

		$ch = curl_init();
		if (empty($page) || !ctype_digit($page)) {
			$page = 1;
			curl_setopt($ch, CURLOPT_URL, $this->API);
		} else {
			curl_setopt($ch, CURLOPT_URL, $this->API . '?start=' . $page);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$responseData = json_decode($response);

		if ($responseData->meta != null) {
			$config['base_url'] = 'http://localhost/training-intern/project/index';
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
		}

		$data['projects'] = $responseData->data;
		$data['start'] = $page;

		$this->load->view('templates/header', ['title' => 'Project Management']);
		$this->load->view('project/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$project = json_decode($response);

		$data['project'] = $project->data;

		$ch = curl_init('http://localhost:8080/api/v1/locations' . '?isFull=true');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$locations = json_decode($response);

		$data['locations'] = $locations->data;

		$this->load->view('templates/header', ['title' => 'Edit Project']);
		$this->load->view('project/edit', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$ch = curl_init($this->API . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$response = curl_exec($ch);
		curl_close($ch);

		if ($response) {
			$this->session->set_flashdata('message', 'Project deleted successfully');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete project');
		}

		redirect('project');
	}
}
