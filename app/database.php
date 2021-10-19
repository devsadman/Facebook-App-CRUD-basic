<?php
    /**
     * connection
     */
    function connect(){
        return new mysqli(HOST,USER,PASS,DB);
    }
    /**
     * craete 
     */
    function create($sql){
        return connect()->query($sql);
    }
    /**
     * auth chech
     */
    /**
     * update data
     */
    function update($sql){
        return connect()->query($sql);
    }
    /**
     * all data
     */
    function all($table){
        return connect()->query("SELECT * FROM {$table}");

    }
    function dataCheck($table,$col,$val){
        $data=connect()->query("SELECT {$col} FROM {$table} WHERE {$col}='$val' ");
        if($data->num_rows > 0){
            return false;
        } else{
            return true;
        }
    }

    
?>