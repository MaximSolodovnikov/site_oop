<?php
class main extends ACore {
	
	public function get_content() {
	
		$query = "SELECT id_article, title_article, description_article, img_src, date FROM articles ORDER BY date DESC";
		$result = mysql_query($query);
		
		if(! $result) {
		
			exit("<br /> Ошибка выборки из БД. <br />" . mysql_error());
		
		}
	
		echo "<div id='wrapper'>";

			$row = array();	
			for($i = 0; $i < mysql_num_rows($result); $i++) {
			
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				
				printf("<div id='content'>
							<h1>%s</h1>
							<p>Дата статьи: %s</p><br />
							<p><img src='%s' alt='' />%s</p>
							<p><a href='?option=view&id_text=%s'>Читать далее...</a></p>
						</div>",
							$row['title_article'], $row['date'], $row['img_src'], $row['description_article'], $row['id_article']);
			
			}	
				
		echo "</div>";
	
	}
	
}