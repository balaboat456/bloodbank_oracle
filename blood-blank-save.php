<?php

include('connection.php');
include('data/running.php');
include('data/dateFormat.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');
$status = true;
mysqli_autocommit($conn, FALSE);

    $bloodstockdate = dmyToymd(dateNowDMY());
    $bloodstocktime = date("H:i");


    $stockcross = json_decode($_POST['stockcross']);
    $deletearr = json_decode($_POST['deletearr']);
    $bloodstockmainid = $_POST['bloodstockmainid'];

    $bloodstockeditusername = $_POST['bloodstockeditusername'];
    $bloodstockremarkeditid = $_POST['bloodstockremarkeditid'];
    $bloodstockotherremark = $_POST['bloodstockotherremark'];

    $update = false;

    foreach ($deletearr as $item) {
        $condition = '';
        $im = json_decode($item);
        $bloodstocktypecross = $im[0]->bloodstocktypecross ;
        $donateid = $im[0]->donateid ;


        if($bloodstocktypecross == 'PRC')
        $condition = "prcused = '0'";

        if($bloodstocktypecross == 'LPRC')
        $condition = "lprcused = '0'";

        if($bloodstocktypecross == 'LDPRC')
        $condition = "ldprcused = '0'";

        if($bloodstocktypecross == 'FFP')
        $condition = "ffpused = '0'";

        if($bloodstocktypecross == 'PC')
        $condition = "pcused = '0'";

        if($bloodstocktypecross == 'LPPC')
        $condition = "lppcused = '0'";

        if($bloodstocktypecross == 'SDP')
        $condition = "sdpused = '0'";

        if($bloodstocktypecross == 'SDR')
        $condition = "sdrused = '0'";

        if($bloodstocktypecross == 'WB')
        $condition = "wbused = '0'";

        if($bloodstocktypecross == 'LPPC_PAS')
        $condition = "lppc_pasused = '0'";

        if($bloodstocktypecross == 'SDP_PAS')
        $condition = "sdp_pasused = '0'";
        

        $sql = "UPDATE donate SET $condition WHERE donateid = '$donateid'";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

    }

    
    if(!empty($bloodstockmainid))
    {
        $sql = "DELETE FROM bloodstock WHERE bloodstockmainid = '$bloodstockmainid' ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;
    }


    if(empty($bloodstockmainid))
    if(count($stockcross) > 0)
    {
        $running = getRunningYM('SK');
        $bloodstockmainid = $running['runn'];
        $bloodstockmaincode = $running['code'];
        $update = true;
    }
    

    $bloodstockmaintypecross = '';
    $bloodstockmainrfid = '';
    $bloodstockmainbagnumber = '';
    $pickupofficer = '';
    $bloodstockmainamount = count($stockcross);
    $seq = 1;
    foreach ($stockcross as $item) {

        $running = getRunningYM('ST');
        $bloodstockid = $running['runn'];
        $bloodstockcode = $running['code'];

        $im = json_decode($item);
        $hospitalid = $im[0]->hospital ;
        $receivingtypeid = $im[0]->receivingtypeid ;
        $bloodstocktypecross = $im[0]->bloodstocktypecross ;
        $bag_number = $im[0]->bag_number ;
        $bloodstockrfid = substr($im[0]->rfidcode ,0,24);
        $sub = $im[0]->sub ;
        $rubberbandnumber = $im[0]->rubberbandnumber ;
        $bloodgroup = $im[0]->bloodgroupcross ;
        $bloodrh = $im[0]->bloodrhcross ;
        $bloodgroupcrossconfirm = $im[0]->bloodgroupcrossconfirm ;
        $bloodrhcrossconfirm = $im[0]->bloodrhcrossconfirm ;
        $volume = $im[0]->volume ;
        $bloodstart = dmyToymd($im[0]->donation_date_cross) ;
        $bloodexp = dmyToymd($im[0]->donation_exp_cross) ;
        $bagtypeid = $im[0]->bloodbagtype ;
        $antibody = $im[0]->antibody ;
        $phenotype = $im[0]->phenotype ;
        $pickupofficer = $im[0]->staff ;
        $donateid = $im[0]->donateid ;
        $donorid = $im[0]->donorid ;

        
        if(!checkArr($bloodstockmaintypecross,$bloodstocktypecross))
        $bloodstockmaintypecross = $bloodstockmaintypecross.$bloodstocktypecross.', ';

        if(!checkArr($bloodstockmainrfid,$bloodstockrfid))
        $bloodstockmainrfid = $bloodstockmainrfid.$bloodstockrfid.', ';

        if(!checkArr($bloodstockmainbagnumber,$bag_number))
        $bloodstockmainbagnumber = $bloodstockmainbagnumber.$bag_number.', ';


        $sql = "
                INSERT INTO bloodstock
                (
                    bloodstockid,
                    bloodstockcode,
                    bloodstockmainid,
                    seq,
                    hospitalid,
                    receivingtypeid,
                    bloodtype,
                    bag_number,
                    bloodstockrfid,
                    sub,
                    rubberbandnumber,
                    bloodgroup,
                    bloodrh,
                    bloodgroupconfirm,
                    bloodrhconfirm,
                    volume,
                    bloodstart,
                    bloodexp,
                    bagtypeid,
                    antibody,
                    phenotype,
                    donateid,
                    donorid,
                    bloodstockeditusername,
                    bloodstockremarkeditid,
                    bloodstockotherremark
                )
                value
                (
                    '$bloodstockid',
                    '$bloodstockcode',
                    '$bloodstockmainid',
                    '$seq',
                    '$hospitalid',
                    '10',
                    '$bloodstocktypecross',
                    '$bag_number',
                    '$bloodstockrfid',
                    '$sub',
                    '$rubberbandnumber',
                    '$bloodgroup',
                    '$bloodrh',
                    '$bloodgroupcrossconfirm',
                    '$bloodrhcrossconfirm',
                    '$volume',
                    '$bloodstart',
                    '$bloodexp',
                    '$bagtypeid',
                    '$antibody',
                    '$phenotype',
                    '$donateid',
                    '$donorid',
                    '$bloodstockeditusername',
                    '$bloodstockremarkeditid',
                    '$bloodstockotherremark'
                    
                )
            ";
        $seq++;


        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;


        if($bloodstocktypecross == 'PRC')
        $condition = "prcused = '1'";

        if($bloodstocktypecross == 'LPRC')
        $condition = "lprcused = '1'";

        if($bloodstocktypecross == 'LDPRC')
        $condition = "ldprcused = '1'";

        if($bloodstocktypecross == 'FFP')
        $condition = "ffpused = '1'";

        if($bloodstocktypecross == 'PC')
        $condition = "pcused = '1'";

        if($bloodstocktypecross == 'LPPC')
        $condition = "lppcused = '1'";

        if($bloodstocktypecross == 'SDP')
        $condition = "sdpused = '1'";

        if($bloodstocktypecross == 'SDR')
        $condition = "sdrused = '1'";

        if($bloodstocktypecross == 'WB')
        $condition = "wbused = '1'";

        if($bloodstocktypecross == 'LPPC_PAS')
        $condition = "lppc_pasused = '1'";

        if($bloodstocktypecross == 'SDP_PAS')
        $condition = "sdp_pasused = '1'";

        $sql = "UPDATE donate SET $condition WHERE donateid = '$donateid'";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

    }

    if(empty(!$update))
    {
    if(count($stockcross) > 0)
    {
        $bloodstockmaintypecross = substr($bloodstockmaintypecross,0,strlen($bloodstockmaintypecross)-2);
        $bloodstockmainrfid = substr($bloodstockmainrfid,0,strlen($bloodstockmainrfid)-2);
        $bloodstockmainbagnumber = substr($bloodstockmainbagnumber,0,strlen($bloodstockmainbagnumber)-2);

        $sql = "
                INSERT INTO bloodstock_main
                (
                    bloodstockmainid,
                    bloodstockmaincode,
                    bloodstockmaindate,
                    bloodstockmaintime,
                    bloodstockmaintypecross,
                    bloodstockmainrfid,
                    bloodstockmainbagnumber,
                    pickupofficer,
                    bloodstockmainamount,
                    donatebloodtypeid
                )
                value
                (
                    '$bloodstockmainid',
                    '$bloodstockmaincode',
                    '$bloodstockdate',
                    '$bloodstocktime',
                    '$bloodstockmaintypecross',
                    '$bloodstockmainrfid',
                    '$bloodstockmainbagnumber',
                    '$pickupofficer',
                    '$bloodstockmainamount',
                    '1'
                    
                )
            ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;
    }
    }else
    {
        $bloodstockmaintypecross = substr($bloodstockmaintypecross,0,strlen($bloodstockmaintypecross)-2);
        $bloodstockmainrfid = substr($bloodstockmainrfid,0,strlen($bloodstockmainrfid)-2);
        $bloodstockmainbagnumber = substr($bloodstockmainbagnumber,0,strlen($bloodstockmainbagnumber)-2);

        $sql = "UPDATE bloodstock_main SET
                bloodstockmainamount = '$bloodstockmainamount',
                bloodstockmaintypecross = '$bloodstockmaintypecross',
                bloodstockmainrfid = '$bloodstockmainrfid',
                bloodstockmainbagnumber = '$bloodstockmainbagnumber'
                WHERE bloodstockmainid = '$bloodstockmainid'

            ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

    }

if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo $status;


function checkArr($strArr,$value)
{
    $status = false;
    $v = (explode(", ",$strArr));
    foreach ($v as $item) {
        if($item == $value)
        $status = true;
    }
    return $status;
}


?>