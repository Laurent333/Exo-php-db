<?php
Class Db{
    private static $_connect;
    public static function connect(){
        if( !isset( self::$_connect ) ) { 
            self::$_connect = new mysqli( DB_HOST, DB_USER, DB_MDP, DB_SELECT);     
        }
        return self::$_connect;
    }
}


$db = Db::connect();

$results = $db->query( 'SELECT * FROM articles' );


while ( $row = $results->fetch_object() ){
    echo '<pre>',var_dump( $row ),'</pre>';
    echo $row->TitleArticle;
}