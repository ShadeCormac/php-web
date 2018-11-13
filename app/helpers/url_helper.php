<?php
    //redirect page
    function redirect($page){     
        header('location: '. __URL__ . '/' . $page);
    }
?>