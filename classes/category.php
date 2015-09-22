<?php
class category extends ACore {
	
	public function get_content() {
	
	echo "<div id='wrapper'>";
	
		if (! $_GET['id_cat']) {
			echo "Ошибка выборки.";
		}
		else {
			$id_cat = (int)$_GET['id_cat'];
			if(! $id_cat) {
				echo "Не верные данные для вывода статьи.";
			}
			else {
			
				$query = "SELECT title_article, date, img_src, description_article, id_article FROM articles WHERE cat = '$id_cat'";
				$result = mysql_query($query);
				
				if(! $result) {
					exit("<br/>Ошибка выборки<br/>" . mysql_error());
				}
				
				if(mysql_num_rows($result) > 0) {
				
					$row = array();	
					for($i = 0; $i < mysql_num_rows($result); $i++) {
				
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					
					printf("<div id='content'>
								<h1>%s</h1>
								<p>Дата публикации: %s</p><br />
								<p><img src='%s' alt='' />%s</p>
								<p><a href='?option=view&id_text=%s'>Читать далее...</a></p>
							</div>",
							$row['title_article'], $row['date'], $row['img_src'], $row['description_article'], $row['id_article']);
						}		
				
				}
				else {
				
					echo "<div id='content'><h2>&nbsp;&nbsp;В данном разделе нет статей.</h2></div>";
				
				}
			
				echo "</div>";
			}
		}
	}
}