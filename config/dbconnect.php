<?php
Class Db{
    private static $_connect;
    public static function connect(){
        if( !isset( self::$_connect ) ) { 
            self::$_connect = new mysqli( DB_HOST, DB_USER, DB_MDP, DB_SELECT);    
            /*
            echo "<pre>Jeu de caractère initial : " . self::$_connect->character_set_name() . "<br>";

            if (!self::$_connect->set_charset("utf8")){
                echo "Impossible de changer le jeu de caractère en utf8";
            }else{
                echo "Le jeu de caractère est maintenant : " . self::$_connect->character_set_name();
            }
            echo "</pre>";
            */
        }
        
        return self::$_connect;
    }
}

