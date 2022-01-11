<?php
    $sample  = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';

    function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);

        return ($var);
    }

    function sanitizeInt($var)
    {
        $var = filter_var($var, FILTER_SANITIZE_NUMBER_INT);

        return $var;
    }
?>
