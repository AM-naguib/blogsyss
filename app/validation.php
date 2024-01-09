<?php

function required_input($input){
    if(empty($input)){
        return true;
    }
    return false;
}
function min_length($input, $min){
    if(strlen($input) < $min){
        return true;
    }
    return false;
}
function max_length($input, $max){
    if(strlen($input) > $max){
        return true;    
    }
    return false;
}
