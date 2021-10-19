<?php
    /**
     * msg show
     */
    function msgShow($msg,$type='danger'){
        return "<p class=\"alert alert-{$type}\">{$msg}<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
    }
    /**
     * mail Check
     */
    function mailCheck($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        } else{
            return false;
        }
    }
    /**
     * cell Check
     */
    function cellCheck($cell){
        $length=strlen($cell);
        if(substr($cell,0,5)=='+8801' && $length==14){
            return true;
        } else if(substr($cell,0,4)=='8801' && $length==13){
            return true;
        } else if(substr($cell,0,2)=='01' && $length==11){
            return true;
        } else{
            return false;
        }
    }
    /**
     * move picture
     */
    function move($files,$path='/'){
        $files=$_FILES['photo'];
        $file_name=$files['name'];
        $file_tmp=$files['tmp_name'];
        $file_size=$files['size'];
        move_uploaded_file($file_tmp,$path.$file_name);
        return $file_name;
    }
    /**
     * get hash
     */
    function passHash($pass){
        return password_hash($pass,PASSWORD_DEFAULT);
    }
?>