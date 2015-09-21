<?php
class delete_category extends ACore_admin {
    
    public function get_content() {  
    }
    
    public function obr() {
        
        if($_GET['del']) {
            
           $id_cat = (int)$_GET['del'];
           
            $query = "DELETE FROM `categories` WHERE `id_category` = '$id_cat'";
        
            if( ! mysql_query($query)) {
                exit ("Ошибка удаления из БД" . mysql_error());
            }
            else {
                $_SESSION['res'] = "Категория успешно удалена";
                header("Location:?option=edit_categories");
                exit();
            }
        }
        else {
            exit ("Не верные данные для отображения страницы");
        }
    }
}