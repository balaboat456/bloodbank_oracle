<?php

function dmyToymd($date='')
{
    if(empty($date))
    return '';

    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    $day = '01';
    if($array[0] != '00')
    {
      $day = $array[0];
    }

    $month = '01';
    if($array[1] != '00')
    {
      $month = $array[1];
    }


    if(empty(empty($array[0]) || $array[1]) || empty($array[2]))
    return '0000-00-00';
  
    $result = $array[2]."-".$month."-".$day." ".$array[3];

    return $result;
}

function dmyToymdInt($date='')
{
    if(empty($date))
    return '';

    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    $day = '01';
    if($array[0] != '00')
    {
      $day = $array[0];
    }

    $month = '01';
    if($array[1] != '00')
    {
      $month = $array[1];
    }


    if(empty(empty($array[0]) || $array[1]) || empty($array[2]))
    return '0000-00-00';
  

    $year = intval($array[2])-543;

    $result = $year.$month.$day;

    return intval($result);
}


function dmyhmToymdhm($date='')
{
    if(empty($date))
    return '';

    $date = str_replace("/",",",$date);
    $date = str_replace(" ",",",$date);
    $array = explode(',',$date);

    if(empty(empty($array[0]) || $array[1]) || empty($array[2]))
    return '0000-00-00 00:00';
  
    $result = $array[2]."-".$array[1]."-".$array[0]." ".$array[3];

    return $result;
}

function date543year($datenew)
{

    if(empty($datenew) || $datenew == 'null')
    return '';


    $date = DateTime::createFromFormat('Y-m-d', $datenew);
    $date->modify('+543 years');
    return $date->format('Y-m-d');

}

function dateDiff543year($datenew)
{
    $date = DateTime::createFromFormat('Y-m-d', $datenew);
    $date->modify('-543 years');
    return $date->format('Y-m-d');

}

function dateYMDHMDiff543yearInt($datenew)
{
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $datenew);
    $date->modify('-543 years');
    return $date->format('YmdHis');

}


function calAgeText($birthdate){

    if(empty($birthdate) ||  $birthdate == '0000-00-00' ||  $birthdate == 'null')
    {
        return '';
    }

    $today = date('Y-m-d');
      list($byear,$bmonth,$bday) = explode('-',$birthdate);
      list($tyear,$tmonth,$tday) = explode('-',$today);
  
      if($byear < 1970){
        $yearad = 1970 - $byear;
        $byear = 1970;
      }else{
        $yearad = 0;
      }
  
      $mbirth = mktime(0,0,0, $bmonth,$bday,$byear);
      $mtoday = mktime(0,0,0, $tmonth,$tday,$tyear);
  
      $mage = ($mtoday - $mbirth);
      $wyear = (date('Y', $mage)-1970+$yearad);
      $wmonth = (date('m', $mage)-1);
      $wday = (date('d', $mage)-1);
  
      $ystr = ($wyear > 1 ? " ปี" : " ปี");
      $mstr = ($wmonth > 1 ? " เดือน" : " เดือน");
      $dstr = ($wday > 1 ? " วัน" : " วัน");
  
      if($wyear > 0 && $wmonth > 0 && $wday > 0) {
        $agestr = $wyear.$ystr." ".$wmonth.$mstr." ".$wday.$dstr;
       }else if($wyear == 0 && $wmonth == 0 && $wday > 0) {
         $agestr = $wday.$dstr;
       }else if($wyear > 0 && $wmonth > 0 && $wday == 0) {
         $agestr = $wyear.$ystr." ".$wmonth.$mstr;
       }else if($wyear == 0 && $wmonth > 0 && $wday > 0) {
         $agestr = $wmonth.$mstr." ".$wday.$dstr;
       }else if($wyear > 0 && $wmonth == 0 && $wday > 0) {
         $agestr = $wyear.$ystr." ".$wday.$dstr;
       }else if($wyear == 0 && $wmonth > 0 && $wday == 0) {
         $agestr = $wmonth.$mstr;
       }else {
         $agestr ="";
       }
  
        return $agestr;
  }




?>