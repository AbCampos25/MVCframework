<?php

class verificar{

    public static function email($email){
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function logado(){
        if (isset($_SESSION['id'])) {
            return true;
        }
        else 
            return false;
    }
}