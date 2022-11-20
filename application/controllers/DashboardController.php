<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_AuthController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User', 'user');
		$this->load->helper(array('my_helper','generic_helper'));
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$this->load->view('dashboard/index', $data);
	}

	public function users(){
		$data['title'] = 'Users List';
		$_SESSION['page'] = 'user';
		$data['users'] = getRecords('login', null);
		$this->load->view('dashboard/users', $data);	
	}

	public function adduser(){
		$data['title'] = 'New User';
		$_SESSION['page'] = 'user';
		if($this->input->method(TRUE) == 'POST'){
			$users = $_POST;
			$users['created_at'] = date('Y-m-d H:i:s');
			$users['password'] = md5($users['password']);
			$id = insertRecord('login', $users);
			if(!empty($id)){
				$this->session->set_flashdata('success','New user inserted..'); 
				redirect('admin/add-users');
			}
		}
		$this->load->view('dashboard/userform', $data);
	}

	public function todo(){
		$data['title'] = 'Todo List';
		$_SESSION['page'] = 'todo';
		$data['list'] = $this->user->getTask();

		$this->load->view('dashboard/todo_list', $data);	
	}

	public function addTask(){

		$data['title'] = 'New Task';
		$_SESSION['page'] = 'todo';
		if($this->input->method(TRUE) == 'POST'){
			$task = $_POST;
			$task['created_at'] = date('Y-m-d H:i:s');
			$task['created_by'] = $_SESSION['logged_in']['name'];
			$id = insertRecord('task_list', $task);
			if(!empty($id)){
				$this->session->set_flashdata('success','New Task inserted..'); 
				redirect('admin/add-task');
			}
		}
		$data['users'] = getRecords('login', null);
		$this->load->view('dashboard/addtask', $data);
	}


	public function pendingTask(){
		$data['title'] = 'Pending Task';
		$_SESSION['page'] = 'todo';
		$data['list'] = $this->user->getTask('pending');

		$this->load->view('dashboard/todo_list', $data);	
	}

	public function completedTask(){
		$data['title'] = 'Completed Task';
		$_SESSION['page'] = 'todo';
		$data['list'] = $this->user->getTask('completed');

		$this->load->view('dashboard/todo_list', $data);	
	}

	public function reply(){
		if($this->input->method(TRUE) == 'POST'){
			extract($_POST);
			$task_reply = array('task_id' => $task_id,
								'reply' => $reply,
								'reply_by' =>$_SESSION['logged_in']['name'],
								'created_at' => date('Y-m-d H;i:s'));

			$id = insertRecord('task_reply', $task_reply);
			if(!empty($id)){
				$this->db->update('task_list',array('status' => $status), array('task_id' => $task_id));
			}
			header('type:application/json');
			echo json_encode(array('status' => 'success', 'response' => 'reply successfully..'));
			die;
		}
	}

	public function deleteTask($task_id){
		return $this->db->delete('task_list', array('task_id' => $task_id));
	}		

	public function getpost()
	{
		if (empty($_POST)) {
			$this->load->view('errors/html/error_method');
		} else {
			return json_decode(json_encode($_POST));
		}
	}

}
