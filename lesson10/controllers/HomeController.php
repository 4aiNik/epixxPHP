<?php

class HomeController extends BaseController {

	public function index() {
		$this->LoadModel('Messages');
		$model = new MessagesModel();
		
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$page = (int) $page;

		$data['page'] = $page;
		$data['total'] = $model->getMessagesCount();
		$data['messages'] = $model->getAllMessages($page);
		$this->LoadPage('home',$data);
	}
}
