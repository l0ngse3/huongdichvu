<?php
	class NewsModel extends Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function find_by_tag($tag)
		{
			$sql = "SELECT *,DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as time FROM news WHERE title LIKE '%$tag%'";
			return $this->db->Executequery($sql);
		}

		public function find($slug)
		{
			$sql = "SELECT * FROM news WHERE slug = '$slug'";
			return $this->db->Executequery($sql);
		}

		public function rand()
		{
			$sql = "SELECT *,DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as time FROM news ORDER BY RAND() LIMIT 6";
			return $this->db->Executequery($sql);
		}

		public function count()
		{
			$sql = "SELECT COUNT(*) AS count FROM news";
			return $this->db->Executequery($sql)[0]['count'];
		}

		public function paginate($trang,$news_display)
		{
			$sql = "SELECT *,DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as time FROM news LIMIT $trang,$news_display";
			return $this->db->Executequery($sql);
		}

		public function top5()
		{
			$sql = "SELECT *,DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as time FROM news LIMIT 5";
			return $this->db->Executequery($sql);
		}

		public function like($keyword)
		{
			$sql = "SELECT *,DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') as time FROM news WHERE title LIKE '%$keyword%'LIMIT 10";
			return $this->db->Executequery($sql);
		}

	}