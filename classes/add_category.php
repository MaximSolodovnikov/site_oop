<?php
class add_category extends ACore_admin {
	
    protected function obr() {

        $id = $POST['id'];
        $title = $_POST['title'];

        if( ! empty($title)){

            $query = "INSERT INTO `categories` (`name_category`)
                                      VALUES('$title')";
                if( ! mysql_query($query)) {

                        exit("<br />Ошибка внесения в БД<br />" . mysql_error());

                }
                else {

                    $_SESSION['res'] = "Данные успешно внесены в БД";
                    header("Location:?option=add_category");
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
        
        $cat = $this->get_categories();
				
print <<<HEREDOC
    <form action='' method='POST'>
        <p>Заголовок категории<br />
            <input type='text' name='title' />
        </p><br />
        <p><input type='submit' name='bottom' value='Сохранить' /></p>
    </form>
</div>
HEREDOC;
    }
}
