<?php

    function sanitizeString($var)
    {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);

        return ($var);
    }

    function sanitizeInt($var)
    {
        $var = filter_var(preg_replace('~^[^-\d]|(?<!^)\D~', '', $var), FILTER_SANITIZE_NUMBER_INT);

        return $var;
    }
?>
