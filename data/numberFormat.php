<?php

function replace_comma($num='')
{

    if(!$num)
    return '0';
    
    return str_replace(",","",$num);
}


?>