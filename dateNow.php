<?php

function dateNowDMY()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return $original_wday.'/'.$original_month.'/'.($original_year+543);
}

function dateNowYMDNOspit()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return ($original_year + 543). $original_month. $original_wday;
}

function dateNowDMYFirst()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return '01/'.$original_month.'/'.($original_year+543);
}


function dateNowTMD()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return ($original_year+543).'-'.$original_month.'-'.$original_wday;
}

function dateNowYMDHM()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $time = date("H:i") ;
    return ($original_year+543).'-'.$original_month.'-'.$original_wday.' '.$time;
}

function dateNowDMYDiff3()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('-2 days'));
    return date_format($date, 'd/m/Y');
    // return $date;
}

function dateNowDMYDiff7()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('-7 days'));
    return date_format($date, 'd/m/Y');
    // return $date;
}

function dateNowYMDPush7()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('+7 days'));
    return date_format($date, 'Y-m-d');
    // return $date;
}

function dateNowYMDMonth1()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('+1 month'));
    return date_format($date, 'Y-m-d');
    // return $date;
}

function dateNowYMDMonthDiff3()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('-3 month'));
    return date_format($date, 'Y-m-d');
    // return $date;
}

function dateNowDMYMonthDiff1()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $datenew =  ($original_year+543).'-'.$original_month.'-'.$original_wday;

    $date = date_create($datenew);
    date_add($date, date_interval_create_from_date_string('-1 month'));
    return date_format($date, 'd/m/Y');
    // return $date;
}

function yearNowDMY()
{
    $original_year = date("Y");
    return ($original_year+543);
}



function dateConDMY($date)
{
    $original_wday = date("d",$date);
    $original_month = date("m",$date);
    $original_year = date("Y",$date);
    return $original_wday.'/'.$original_month.'/'.($original_year+543);
}

function dateNowYMDHM_no()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $time = date("H:i");
    return ($original_year + 543) . $original_month . $original_wday . $time;
}

function dateNowYMDHMS_AD_NO()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    $time = date("His");
    return ($original_year ) . $original_month . $original_wday . $time;
}

function dateNowYMD_no()
{
    $original_wday = date("d");
    $original_month = date("m");
    $original_year = date("Y");
    return ($original_year + 543) . $original_month . $original_wday;
}


?>