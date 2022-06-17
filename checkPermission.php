<?php

function checkPermission($menu,$action)
{
    session_start();
    $role_data = $_SESSION['role_data'];
    $status = false;

    foreach ($role_data as $value) {

        if($value->menucode == $menu)
        foreach ($value->menuaction as $v) {
            
            if($v->actioncode == $action)
            $status = true;
        }
    }

    return $status;
}


?>