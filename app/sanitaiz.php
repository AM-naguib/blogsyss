<?php 

function sanitaiz($string){
    return trim(html_entity_decode(htmlspecialchars($string)));
}