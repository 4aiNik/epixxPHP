<?php

class MessagesModel extends BaseModel{

	public function getAllMessages($limit = '0') {
		$db = $this->connection();
		$query = "SELECT * FROM `messages`";
		if($limit !== '0') {
			$query .= " LIMIT {$limit} ";
		}
		
		$result = $db->query($query);
		return $result -> fetchAll();
	}
	
	public function addPost($text) {
		$db = $this->connection();
		$query = "INSERT INTO `messages` SET `message` = :message, `date`=NOW()";
		$stmt = $db->prepare($query);
		$stmt->execute(['message' => $text]);
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
