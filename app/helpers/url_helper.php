<?
    //redirect page
    echo 1;
    function redirect($page){
        
        header('location: '. __URL__ . '/' . $page);

    }
?>