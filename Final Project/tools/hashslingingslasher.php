<?php

    function hasher($id){ //hashes id from db for user-presented links
        return $id * 42 + (15^4);
    }

    function dehash($hash){ //dehashes the id
        return ($hash - (15 ^ 4)) / 42;
    }


?>