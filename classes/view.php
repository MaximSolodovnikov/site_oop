<?php
class view extends ACore {

	public function get_content() {
		
		echo "<div id='wrapper'>";
		
		if (! $_GET['id_text']) {
			echo "Ошибка выборки.";
		}
		else {
			$id_text = (int)$_GET['id_text'];
			if(! $id_text) {
				echo "Не верные данные для вывода статьи.";
			}
			else {
				$query = "SELECT title_article, date, img_src, text_article, id_article FROM articles WHERE id_article = '$id_text'";
				$result = mysql_query($query);
				
				if(! $result) {
					exit("<br/>Ошибка выборки<br/>" . mysql_error());
				}

					$row = mysql_fetch_array($result, MYSQL_ASSOC);

					printf("<div id='content_article'>
								<h1>%s</h1>
								<p>Дата публикации: %s</p><br />
								<p><img src='%s' alt='' />%s</p>
							</div>",
							$row['title_article'], $row['date'], $row['img_src'], $row['text_article']);
				}
				echo "</div>";
			}			
		}
	}