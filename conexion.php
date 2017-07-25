<?php  
require_once "config.php"; 

class Modelo 
{ 
    protected $_db; 

    public function __construct() 
    { 
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

        if ( $this->_db->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        } 

        $this->_db->set_charset(DB_CHARSET); 
        
        $this->_db1 = new mysqli(DB_HOST1, DB_USER1, DB_PASS1, DB_NAME1); 

        if ( $this->_db1->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db1->connect_error; 
            return;     
        } 

        $this->_db1->set_charset(DB_CHARSET1);
    } 
} 
?> 