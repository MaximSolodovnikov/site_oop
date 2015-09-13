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
	
	protected function get_menu() {
	
		$row = $this->menu_array();
		
		echo "<div id='menu'>
				<ul>";
			echo "<a href='?option=main'>Главная</a>";
				foreach($row as $item) {
				
				printf("<a href='?option=menu?id_menu=%s'>%s</a>",
						$item['id_menu'], $item['name_menu']);
				
				}

		echo	"<ul>
			</div>";
	
	}
	
	protected function menu_array() {
	
		$query = "SELECT id_menu, name_menu FROM menu";
		$result = mysql_query($query);
		if (! $result) {
		
			exit(mysql_error());
		
		}
		
		$row = array();
		
		for($i = 0; $i < mysql_num_rows($result); $i++) {
		
			$row[] = mysql_fetch_array($result, MYSQL_ASSOC);
		
		}
		
		return $row;
	
	}
	
	abstract function get_content ();
	
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
	
}