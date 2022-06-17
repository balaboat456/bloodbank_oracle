<?php

function laststring($str='')
{

    if($str == "")
    return "";


    
    return substr_replace($str,"", -1); ;
}


?>