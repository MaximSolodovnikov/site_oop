<?php
abstract class ACore {
	
	protected $db;
	
	public function __construct() {
		
		$this->db = mysql_connect(HOST, USER, PASS);
		if (! $this->db) {
			
			exit("<br />Нет соединения с Базой данных. <br />" . mysql_error());
			
		}
		if (! mysql_select_db(DB, $this->db)) {
			
			exit("<br />Не существует такой Базы данных. <br />" . mysql_error());
			
		}
		
		mysql_query("SET NAMES 'UTF-8'");
		
	}
	
	protected function get_header() {
		
		include ("layout/header.php");
		
	}
	
	protected function get_navigation() {
		
		$query = "SELECT id_category, name_category FROM categories";
		$result = mysql_query($query);
		
		if (! $result) {
			
			exit("<br /> Ошибка выборки <br />" . mysql_error());
			
		}
		$row = array();
		
		
			echo "<div id='navigation'>";
			
				for($i = 0; $i < mysql_num_rows($result); $i++) {
					
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					printf("<a href='?option=category&id=%s'>%s</a>", 
							$row['id_category'], $row['name_category']);
					
				}
				
			echo "</div>";
		
	}
	
	public function get_body() {
		
		$this->get_header();
		$this->get_navigation();
		
	}
	
}