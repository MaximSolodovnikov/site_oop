<?php
class add_menu extends ACore_admin {
	
    protected function obr() {

        
        $title = $_POST['title'];
        $text = $_POST['text'];

        if( ! empty($title) || ! empty($text)){

            $query = "INSERT INTO `menu` (`name_menu`, `text_menu`)
                                      VALUES('$title','$text')";
                if( ! mysql_query($query)) {

                        exit("<br />Ошибка внесения в БД<br />" . mysql_error());

                }
                else {

                    $_SESSION['res'] = "Данные успешно внесены в БД";
                    header("Location:?option=add_menu");
                    exit();
                }
            }
            else {
                exit("<br />Вы не заполнили все поля.<br />");
            }
    }

    public function get_content() {

        echo "<div id='wrapper'>";

        if($_SESSION['res']) {

            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }
				
print <<<HEREDOC
    <form action='' method='POST'>
        <p>Заголовок пункта меню<br />
        <input type='text' name='title' />
        </p>
        <p>Текст меню<br />
        <textarea name='text' rows='10' cols='50'></textarea>
        </p>
        <input type='submit' name='bottom' value='Сохранить' /><br />
    </form>
</div>
HEREDOC;
    }
}
