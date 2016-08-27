<?php

class MessagesModel extends BaseModel{

	public function getAllMessages($limit = '0') {
		$db = $this->connection();
		$query = "SELECT `m`.* ,`u`.`login` AS `user_name` FROM `messages` AS `m` 
					LEFT JOIN `users` AS `u` ON `u`.`id` = `m`.`user_id` ORDER BY `m`.`date` DESC LIMIT 0, 10";
		
		$result = $db->query($query);
		return $result -> fetchAll();
	}
	
	public function addPost($text, $userId) {
		$db = $this->connection();
		$query = "INSERT INTO `messages` SET `message` = :message, `date`=NOW(), `user_id` = :userId";
		$stmt = $db->prepare($query);
		$stmt->execute(['message' => $text, 'userId' => $userId]);
		return $db->lastInsertId();
	}

	public function getPost($id) {
		$db = $this->connection();
		$query = "SELECT * FROM `messages` WHERE `id` = :id";
		$stmt = $db->prepare($query);
		$stmt->execute(['id' => $id]);
		return $stmt->fetch();
	}

	public function editPost($id,$text) {
		$db = $this->connection();
		$query = "UPDATE `messages` SET `message` = :message WHERE `id` = :id" ;
		$stmt = $db->prepare($query);
		$stmt->execute(['message' => $text, 'id' => $id]);
	}

	public function deletePost($id) {
		$db = $this->connection();
		$query = "DELETE FROM `messages` WHERE `id` = :id" ;
		$stmt = $db->prepare($query);
		$stmt->execute(['id' => $id]);
	}
}
