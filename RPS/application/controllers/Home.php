<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('AdminModel');
		$this->load->model('CrudModel');
		// $this->load->model('TuitionModel');
	}

	public function login_validation(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		
		if ($this->form_validation->run()){
			$username = $this->input->POST('username');
			$password = $this->input->POST('password');


			if($this->AdminModel->loginAdmin($username, $password)){
				$session_data = array (
					'username' => $username
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('index'));//papuntanng home
			}else{
				$this->session->set_flashdata('error', 'Invalid Username and Password');
				redirect(base_url()); //sal 
			}
		}
	}




	public function index(){
		// $this->load->model('AdminModel'); // Make sure to load the model containing the `countStudents()` function
    	$counts = $this->AdminModel->countStudents();
		$data['countStudent'] = count($counts['countStudent']);
		$data['countPending'] = count($counts['countPending']);
		$data['countFull'] = count($counts['countFull']);
		$data['title'] = "Title";

		$data['nurseryTuition'] = $this->AdminModel->getNurseryTuition();
		$data['nursery2Tuition'] = $this->AdminModel->getNursery2Tuition();
		$data['kinderTuition'] = $this->AdminModel->getKinderTuition();

		$this->load->view('pages/home/home', $data);
	}		


    

	public function login(){
		$this->load->view('pages/home/login');
	}
	

	public function dispstud(){
		$data['students'] = $this->AdminModel->viewStudents();
		// $data['transactionLog'] = $this->AdminModel->($studentID);
		$this->load->view('pages/home/students', $data);
		// $this->load->view('pages/home/modals/viewTransaction', $data);

	}

	public function transaction(){
		$data['payments'] = $this->AdminModel->viewPayments();
		
		$this->load->view('pages/home/transaction',$data);
	}

	public function viewUserTransaction(){
		$d = $this->input->GET('id');

		$results = $this->AdminModel->getRowsById($d);
		echo json_encode($results);
		// $this->load->view('pages/home/students');
		
	}

	public function payment(){
		$this->form_validation->set_rules('st_amount', 'Amount Paid', 'required');
		$this->form_validation->set_rules('st_receiver', 'Received By', 'required');


		$date = date('Y-m-d');
		$data = array(
			'st_id' => $this->input->post('st_ID'),
			'name' => $this->input->post('st_FN'),
			'or_number' => $this->input->post('st_OR'),
			'date_paid' => $date,
			'remarks' => $this->input->post('st_remarks'),
			'amount_paid' => $this->input->post('st_amount'),
			'received_by' => $this->input->post('st_receiver'),

		);

		$total = $this->input->post('st_total');
		$remaining = $this->input->post('st_remaining');
		$amount_paid = $this->input->post('st_amount');
		$st_id = $this->input->post('st_ID');
		$balance = $total + ($remaining - $amount_paid);

		if ($remaining == 0){
			$this->swalErr('This student is already fully paid');
		}elseif ( $balance < 0 ) {
			$this->swalErr('Amount payment must be exact');
		}else{
			$results = 	$this->CrudModel->payments($data);
			$resultUpdate = $this->CrudModel->updateRemaining($st_id, $balance);
			if ($results){
				$this->swalSuc('Transaction Complete');
			}
		}
		


	}


	public function enrollStudent(){
		
		$this->form_validation->set_rules('st_fName', 'First Name', 'required');
		$this->form_validation->set_rules('st_mName', 'Middle Name', 'required');
		$this->form_validation->set_rules('st_lName', 'Last Name', 'required');
		// $this->form_validation->set_rules('st_id', 'Student ID', 'required');
		if ($this->form_validation->run() == FALSE) {
			$response = array(
				'title' => 'Validation Error',
				'icon' => 'error',
				'errors' => validation_errors()
			);
			echo json_encode($response);
			return;
		}
		$maxId = $this->CrudModel->getMaxId();
		$nextId = $maxId + 1;

		$st_level = $this->input->post('st_level');
		$levelMapping = array(
			'1' => array('total' => '20000', 'level' => 'Nursery'),
			'2' => array('total' => '25000', 'level' => 'Nursery-2'),
			'3' => array('total' => '30000', 'level' => 'Kinder')
		);
		
		if (isset($levelMapping[$st_level])) {
			$mapping = $levelMapping[$st_level];
			$data = array(
				'st_fName' => $this->input->post('st_fName'),
				'st_mName' => $this->input->post('st_mName'),
				'st_lName' => $this->input->post('st_lName'),
				'st_id' => $nextId,
				'st_level' => $mapping['level'],
				'st_typePayment' => $this->input->post('st_ToP'),
				'st_SY' => $this->input->post('st_SY'),
				'st_dateEnrolled' => $this->input->post('st_dateEnrolled'),
				'st_total' => $mapping['total'],
				'st_payable' => '0',
				'remaining' => $mapping['total']
			);
		}
		$results = $this->CrudModel->enroll($data);
		if ($results)
		{
			$response = array (
				'title' => 'Student Enrolled',
				'icon' => 'success');
			echo json_encode($response);
		}

	}

	public function checkdb()
	{
		$this->load->database();

		if ($this->db->initialize()) {
			echo 'Database connection is successful.';
		} else {
			echo 'Unable to connect to the database.';
		}
	}

	public function swalSuc($msg)
	{
		$response = array (
			'title' => $msg, 
			'icon'=> 'success'
		);
		echo json_encode($response);
	}

	public function swalErr($msg)
	{
		$response = array (
			'title' => $msg, 
			'icon'=> 'error'
		);
		echo json_encode($response);
	}

}
