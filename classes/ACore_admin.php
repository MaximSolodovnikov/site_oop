<?php
abstract class ACore_admin {
	
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
		
		echo "<div id='navigation'>";
			
			echo "<a href='?option=edit_articles'>Статьи</a>";
			echo "<a href='?option=edit_menu'>Меню</a>";
			echo "<a href='?option=edit_categories'>Категории</a>";
				
		echo "</div>";
	}
	
	protected function get_menu() {
		
		echo "<div id='menu'>
				<ul>";
			echo "<a href='?option=main'>Главная</a>";
				
		echo	"<ul>
			</div>";
	
	}
	
	protected function get_footer() {
	
		include_once("layout/footer.php");
	}
	
	public function get_body() {
		
		$this->get_header();
		$this->get_menu();
		$this->get_navigation();
		$this->get_content();
		$this->get_footer();
		
	}
	
	abstract function get_content();
}