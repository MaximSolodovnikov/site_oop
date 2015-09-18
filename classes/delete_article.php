<?php
class delete_article extends ACore_admin {
    public function get_content() {
        
    }
    
    public function obr() {
        if($_GET['del']) {
           $id_text = (int)$_GET['del'];
           
        $query = "DELETE FROM articles WHERE id_article = '$id_text'";
        
            if(! mysql_query($query)) {
                exit ("Ошибка удаления из БД" . mysql_error());
            }
            else {
                $_SESSION['res'] = "Стаья успешно удалена";
                header("Location:?option=admin");
                exit();
            }
        }
        else {
            exit ("Не верные данные для отображения страницы");
        }
    }
}