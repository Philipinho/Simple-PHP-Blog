<?php
function slug($string) {
    $string = htmlentities($string, ENT_COMPAT, "UTF-8");
    $string = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $string);
    $string = trim($string);
    $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string);
    $string = str_replace(' ', '-', $string);
    $string = strtolower($string);
    $string = substr($string, 0, 100);
    return $string;
}
