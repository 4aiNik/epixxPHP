<?php
class AccountModel extends BaseModel {

	private $salt = "qscgyj,lp";

	public function isAuthed() {
		$db = $this->connection();

		if(!isset($_SESSION['user_id'])) {
			return false;
		}

		$userId = $_SESSION['user_id'];

		$stmt = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
		$stmt->execute(['id' => $userId]);

		if ($stmt->rowCount() == 1) {
			return true;
		}
		return false;
	}

	public function findByLoginPassword($login,$password) {
		$password = $this->encryptPass($password);

		$stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = :login AND `password` = :password");
		$stmt->execute([`login` => $login, `password` => $password]);

		if ($stmt->rowCount() == 1) {
			return $stmt->fetch();			
		}
		return false;
	}

	public function encryptPass($pass) {
		return md5($pass . $this->salt);
	}
}