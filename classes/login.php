<?php
class login extends ACore {
    
    protected function obr() {
        
        $login = strip_tags(mysql_real_escape_string($_POST['login']));
        $password = strip_tags(mysql_real_escape_string($_POST['password']));
        
        if( ! empty($login) AND ! empty($password)) {
            $password = md5($password);
            
            $query = "SELECT `id_user` FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
            $result = mysql_query($query);
            
            if( ! $result) {
                exit("<br /> Ошибка выборки <br />" . mysql_error());
            }
            
            if(mysql_num_rows($result) == 1) {
                $_SESSION['user'] = TRUE;
                header("Location:?option=admin");
                exit();
            }
            else {
                exit("<br /> Такого пользователя не существует <br />");
            }
        }
        else {
            exit("<br /> Ошибка входа <br />");
        }
    }
	
public function get_content() {

echo "<div id='wrapper_login'>";
print <<<HEREDOC
    <form action='' method='POST'>
        <p>Логин<br />
        <input type='text' name='login' />
        </p>
        <p>Пароль<br />
        <input type='password' name='password' />
        </p>
        <br />
        <p><input type='submit' name='button' value='Вход' /></p>
    </form>
HEREDOC;
    echo "</div>";
    }	
}