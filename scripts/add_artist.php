<?php

    function add_artist($name, $sql) {    
        $query = "INSERT INTO artist (artist_name) VALUES ('$name')";
        $result = $sql->query($query);
    
        if($result){
            echo "Artist inserted";
        } else {
            echo "Artist not inserted";
        }  
    } 
?>