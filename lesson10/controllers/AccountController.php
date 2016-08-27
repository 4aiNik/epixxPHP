<?php

class AccountController extends BaseController {

	
	public function index()
	{
		$this->loadModel('Account');
		$model = new AccountModel();
		
		if($model->isAuthed()) {
			$this->redirectToAction('index','home');
		}
		
		$data['token'] = $this->makeToken();
		$data['action'] = 'index.php?action=account&method=login';
		$data['title'] = 'Auth';
		$this->LoadPage('authReg',$data);
	}
	
	public function login() 
	{
		$this->loadModel('Account');
		$model = new AccountModel();
		
		
		
		if($user = $model->getUserByLoginPassword($_POST['login'],$_POST['password'])) {
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['login'] = $_POST['login'];
			$this->redirectToAction('index','home');
		}
		
		$data['token'] = $this->makeToken();
		$data['error'] = 'Incorrect login/pass';
		$data['action'] = 'index.php?action=account&method=login';
		$data['title'] = 'Auth';
		$this->LoadPage('authReg',$data);
	}
	
	public function register()
	{
		$data['token'] = $this->makeToken();
		$data['action'] = 'index.php?action=account&method=regSave';
		$data['title'] = 'Reg';
		if (isset($_SESSION['error'])) {
			$data['error'] = $_SESSION['error'];
			unset($_SESSION['error']);
		}
		$this->LoadPage('authReg',$data);
	}
	
	public function regSave()
	{
		$this->loadModel('Account');
		$model = new AccountModel();
				
		if($model->getUserByLogin($_POST['login']) > 0) {
			$_SESSION['error'] = 'Error';
			$this->redirectToAction('register','account');
		}
		else
		{
			if($id = $model->registerUser($_POST['login'],$_POST['password']))
			{
				$_SESSION['user_id'] = $id;
				$_SESSION['login'] = $_POST['login'];
				$this->redirectToAction('index','home');
			}
			
			$data['token'] = $this->makeToken();
			$data['action'] = 'index.php?action=account&method=regSave';
			$data['error'] = 'Error';
			$data['title'] = 'Reg';
			$this->LoadPage('authReg',$data);
		}
	}
	
	public function logout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['login']);
		$this->redirectToAction('index','account');
	}
}
