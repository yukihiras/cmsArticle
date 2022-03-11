<?php
    function escape($string){
        global $connection;
        return mysqli_real_escape_string($connection, trim($string)); // Hàm strip_tags() sẽ loại bỏ các thẻ HTML và PHP ra khỏi chuỗi. Hàm sẽ trả về chuỗi đã loại bỏ hết các thẻ HTML và PHP.

    }
    function confirmQuery($result){
        global $connection;
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }




?>