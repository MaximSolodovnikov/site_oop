<?php
class admin extends ACore_admin {
	
	public function get_content() {
		
		$query = "SELECT id_article, title_article FROM articles";
		$result = mysql_query($query);
		
		if(! $result) {
			
			exit("<br />Ошибка выборки<br /> . mysql_error()");
			
		}
		echo "<div id='wrapper'>";
		
		$row = array();
		for($i = 0; $i < mysql_num_rows($result); $i++) {
			
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			
			printf("<div id='admin_articles'><a href='?option=update_articles&id_text=%s'>%s</a></div>",
				$row['id_article'], $row['title_article']);
		}		
		echo "</div>";
	}
}