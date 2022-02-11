<?php

function replace_accents($str) {
    $str = htmlentities($str, ENT_COMPAT, "UTF-8");
    $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/','$1',$str);
    return html_entity_decode($str);
}

function slug($string){
    $slug = trim($string); // trim the string
    $slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );
    $slug= str_replace(' ','-', $slug);
    $slug = strtolower(replace_accents($slug));
    $slug = substr($slug,0, 100);

    return $slug;
}