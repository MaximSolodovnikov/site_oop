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
	
	/*protected function get_navigation() {
		
		echo "<div id='navigation'>";
			
			echo "<a href='?option=admin'>Статьи</a>";
			echo "<a href='?option=edit_menu'>Меню</a>";
			echo "<a href='?option=edit_categories'>Категории</a>";
				
		echo "</div>";
	}*/
	
	protected function get_menu() {
		
		echo "<div id='menu'>
				<ul>";
			echo "<a href='?option=admin'>Админка</a>";
			echo "<a href='?option=main'>Перейти на сайт</a>";
                        
                        echo "<a href='?option=admin'>Статьи</a>";
			echo "<a href='?option=edit_menu'>Меню</a>";
			echo "<a href='?option=edit_categories'>Категории</a>";
				
		echo	"<ul>
			</div>";
	
	}
	
	protected function get_footer() {
	
		include_once("layout/footer.php");
	}
	
	public function get_body() {
		
		if($_POST) {
			
			$this->obr(); // Обработчик формы
			
		}
		
		$this->get_header();
		$this->get_menu();
		/*$this->get_navigation();*/
		$this->get_content();
		$this->get_footer();
		
	}
	
	abstract function get_content();
	
	public function get_categories() {
		
		$query = "SELECT id_category, name_category FROM categories";
		$result = mysql_query($query);
		
		if(! $result) {
			
			exit("<br />Ошибка выборки<br />" . mysql_error());
			
		}
		
		$row = array();
		for($i = 0; $i < mysql_num_rows($result); $i++) {
			
			$row[] = mysql_fetch_array($result, MYSQL_ASSOC);
			
		}
		return $row;
	}
	
	protected function get_data_art($id) {
		
		$query = "SELECT id_article, title_article, description_article, text_article, date FROM articles WHERE id_article = '$id'";
		$result = mysql_query($query);
		
		if(! $result) {
			
			exit("Ошибка выборки" . mysql_error());
			
		}
		$row = array();
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		return $row;
	}
}