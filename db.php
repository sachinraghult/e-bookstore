<?php
    $db =new mysqli("localhost", "root", "", "ebookstore");
    if(!$db){
        echo "<h1>Unable to connect database</h1>";
    }
?>
