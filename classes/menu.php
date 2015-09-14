<?php
class menu extends ACore {

	public function get_content() {
		
		echo "<div id='wrapper'>";
		
		if (! $_GET['id_menu']) {
			echo "Ошибка выборки.";
		}
		else {
			$id_menu = (int)$_GET['id_menu'];
			if(! $id_menu) {
				echo "Не верные данные для вывода меню.";
			}
			else {
				$query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu = '$id_menu'";
				$result = mysql_query($query);
				
				if(! $result) {
					exit("<br/>Ошибка выборки<br/>" . mysql_error());
				}

					$row = mysql_fetch_array($result, MYSQL_ASSOC);

					printf("<div id='content'>
								<h1>%s</h1>
								<p>%s</p>
							</div>",
							$row['name_menu'], $row['text_menu']);
				}
				echo "</div>";
			}			
		}
	}