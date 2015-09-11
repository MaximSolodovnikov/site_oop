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
	
	public function get_body() {
		
		echo "Hello, world";
		
	}
	
}