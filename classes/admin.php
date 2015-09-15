<?php
class admin extends ACore_admin {
	
	public function get_content() {
		
		$query = "SELECT id_article, title_article FROM articles";
		$result = mysql_query($query);
		
		if(! $result) {
			
			exit("<br />Ошибка выборки<br />" . mysql_error());
			
		}
		echo "<div id='wrapper'>";
		echo "<a href='?option=add_article'>Добавление статьи.<a/><hr />";
		
		
		$row = array();
		for($i = 0; $i < mysql_num_rows($result); $i++) {
			
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			
			
			printf("<span id='admin_articles'>
						Статья: <a href='?option=update_articles&id_text=%s'>%s</a>
						<a href='?option=delete_articles&id_text=%s'>Удалить статью.</a><hr />
					</span>",
				$row['id_article'], $row['title_article'], $row['id_article']);
		}		
		echo "</div>";
	}
}