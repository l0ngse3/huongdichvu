<?php

	class AnswerModel extends Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		
		public function findByIdQuestion($id)
		{
			$sql = "SELECT answer.*,DATE_FORMAT(answer.created_at, '%d/%m/%Y %H:%i') as time, user.full_name 
					FROM answer 
					INNER JOIN user ON answer.id_user = user.id
					INNER JOIN question ON answer.id_question = question.id
					WHERE answer.active = 1 AND answer.id_question  = '$id' 
					ORDER BY question.vote DESC";
			return $this->db->Executequery($sql);
		}


		public function add($id_question,$id_user,$content,$tag)
		{
			$sql = "INSERT INTO answer(id_question,id_user,content,tag) VALUES ('$id_question','$id_user','$content','$tag')";
			return $this->db->ExecuteQueryReturnID($sql);
		}

		public function find($id)
		{
			$sql = "SELECT answer.*,DATE_FORMAT(answer.created_at, '%d/%m/%Y %H:%i') as time, user.full_name 
					FROM answer 
					INNER JOIN user ON answer.id_user = user.id
					INNER JOIN question ON answer.id_question = question.id
					WHERE answer.active = 1 AND answer.id  = '$id'";
			return $this->db->Executequery($sql);
		}
	}