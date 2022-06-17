<?php
session_start();
include('connection.php');
include('data/running.php');
include('data/dateFormat.php');
include('dateNow.php');
date_default_timezone_set('Asia/Bangkok');
$status = true;
mysqli_autocommit($conn, FALSE);

    $bloodstockdate = dmyToymd(dateNowDMY());
    $bloodstocktime = date("H:i");
    $username = $_SESSION['username'];

    $stockcross = json_decode($_POST['stockcross']);
    $bloodstockmainid = $_POST['bloodstockmainid'];
    
    $bloodstockmainid2 = $_POST['bloodstockmainid'];

    $bloodstockpaymainid = $_POST['bloodstockpaymainid'];
    $bloodstockeditusername = $_POST['bloodstockeditusername'];
    $bloodstockremarkeditid = $_POST['bloodstockremarkeditid'];
    $bloodstockotherremark = $_POST['bloodstockotherremark'];

    $bloodstockpaygroupdate = $_POST['bloodstockpaygroupdate'];
    

    $update = false;
    
    error_log("====bloodstockmainid=====$bloodstockmainid======");

    if(!empty($bloodstockmainid))
    {
        $update = true;

        $sql = "SELECT * FROM bloodstock  WHERE bloodstockmainid = '$bloodstockmainid' AND active <> 0 ";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $a_qty = 0;
            $b_qty = 0;
            $o_qty = 0;
            $ab_qty = 0;
            $cryo_qty = 0;

            $bloodgroup = $row['bloodgroup'] ;
            $bloodtype = $row['bloodtype'] ;
            $bloodborrowitemid = $row['bloodborrowitemid'] ;
            

            if($bloodgroup == 'A')
            {
                $a_qty++;
            }else if($bloodgroup == 'B')
            {
                $b_qty++;
            }else if($bloodgroup == 'O')
            {
                $o_qty++;
            }else if($bloodgroup == 'AB')
            {
                $ab_qty++;
            }else if($bloodtype == "CRYO")
            {
                $cryo_qty++;
            }

            $sql = "UPDATE blood_borrow_item SET
                    a_qty_get = `a_qty_get`-$a_qty,
                    b_qty_get = `b_qty_get`-$b_qty,
                    o_qty_get = `o_qty_get`-$o_qty,
                    ab_qty_get = `ab_qty_get`-$ab_qty,
                    cryo_qty_get = `cryo_qty_get`-$cryo_qty
                    WHERE bloodborrowitemid = '$bloodborrowitemid'

            ";

            $result_update = mysqli_query($conn, $sql);

            if(empty($result_update))
            $status = false;

            error_log("====$sql======");

            error_log("====8=====$status======");

        }

    }

    if(empty($bloodstockmainid))
    if(count($stockcross) > 0)
    {
        $running = getRunningYM('SK');
        $bloodstockmainid = $running['runn'];
        $bloodstockmaincode = $running['code'];
        
    }

    if(!empty($bloodstockmainid))
    {
        $sql = "UPDATE bloodstock SET
        bloodstockeditusername = '$bloodstockeditusername',
        bloodstockremarkeditid = '$bloodstockremarkeditid',
        bloodstockotherremark = '$bloodstockotherremark',
        active = '0'
        WHERE bloodstockmainid = '$bloodstockmainid' ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;
    }
    

    $bloodstockmaintypecross = '';
    $bloodstockmainrfid = '';
    $bloodstockmainbagnumber = '';
    $pickupofficer = '';
    $bloodstockmainamount = count($stockcross);
    $seq = 1;

    $a_qty = 0;
    $b_qty = 0;
    $o_qty = 0;
    $ab_qty = 0;
    $cryo_qty = 0;

    foreach ($stockcross as $item) {

        $a_qty = 0;
        $b_qty = 0;
        $o_qty = 0;
        $ab_qty = 0;
        $cryo_qty = 0;

        $im = json_decode($item);
        $bloodstockid = $im[0]->bloodstockid ;
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
        $patienthn = $im[0]->patienthn ;
        $patientfullname = $im[0]->patientfullname ;

        $bloodborrowitemid = $im[0]->bloodborrowitemid ;

        $sql = "UPDATE  bloodstock SET 
        bloodstockrfid = ''
        WHERE bloodstockrfid = '$bloodstockrfid' AND bloodstockrfid != ''
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = false;

        
        if(!checkArr($bloodstockmaintypecross,$bloodstocktypecross))
        $bloodstockmaintypecross = $bloodstockmaintypecross.$bloodstocktypecross.', ';

        if(!checkArr($bloodstockmainrfid,$bloodstockrfid))
        $bloodstockmainrfid = $bloodstockmainrfid.$bloodstockrfid.', ';

        if(!checkArr($bloodstockmainbagnumber,$bag_number))
        $bloodstockmainbagnumber = $bloodstockmainbagnumber.$bag_number.', ';

        if($bloodgroup == 'A')
        {
            $a_qty++;
        }else if($bloodgroup == 'B')
        {
            $b_qty++;
        }else if($bloodgroup == 'O')
        {
            $o_qty++;
        }else if($bloodgroup == 'AB')
        {
            $ab_qty++;
        }else if($bloodstocktypecross == "CRYO")
        {
            $cryo_qty++;
        }
    // $sql = "UPDATE bloodstock 
    //         SET bag_number = '$bag_number'
    //         WHERE ";

        if(!empty($bloodstockid))
        {
            $sql = "UPDATE bloodstock SET
                    seq = '$seq',
                    hospitalid = '$hospitalid',
                    receivingtypeid = '$receivingtypeid',
                    bloodtype = '$bloodstocktypecross',
                    bag_number = '$bag_number',
                    bloodstockrfid = '$bloodstockrfid',
                    sub = '$sub',
                    rubberbandnumber = '$rubberbandnumber',
                    bloodgroup = '$bloodgroup',
                    bloodrh = '$bloodrh',
                    bloodgroupconfirm = '$bloodgroupcrossconfirm',
                    bloodrhconfirm = '$bloodrhcrossconfirm',
                    volume = '$volume',
                    bloodstart = '$bloodstart',
                    bloodexp = '$bloodexp',
                    bloodstockpaygroupdate = '$bloodstockpaygroupdate',
                    bagtypeid = '$bagtypeid',
                    antibody = '$antibody',
                    phenotype = '$phenotype',
                    bloodstockeditusername = '$bloodstockeditusername',
                    bloodstockremarkeditid = '$bloodstockremarkeditid',
                    bloodstockotherremark = '$bloodstockotherremark',
                    patienthn = '$patienthn',
                    patientfullname = '$patientfullname',
                    bloodborrowitemid = '$bloodborrowitemid',
                    active = '1'
                    WHERE bloodstockid = '$bloodstockid'
            ";
            $seq++;

            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;

            error_log("====1=====$status======");
        }else
        {
            $running = getRunningYM('ST');
            $bloodstockid = $running['runn'];
            $bloodstockcode = $running['code'];

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
                    bloodstockpaygroupdate,
                    bagtypeid,
                    antibody,
                    phenotype,
                    bloodstockeditusername,
                    bloodstockremarkeditid,
                    bloodstockotherremark,
                    patienthn,
                    patientfullname,
                    bloodborrowitemid,
                    active
                )
                value
                (
                    '$bloodstockid',
                    '$bloodstockcode',
                    '$bloodstockmainid',
                    '$seq',
                    '$hospitalid',
                    '$receivingtypeid',
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
                    '$bloodstockpaygroupdate',
                    '$bagtypeid',
                    '$antibody',
                    '$phenotype',
                    '$bloodstockeditusername',
                    '$bloodstockremarkeditid',
                    '$bloodstockotherremark',
                    '$patienthn',
                    '$patientfullname',
                    '$bloodborrowitemid',
                    '1'
                    
                )
            ";
            $seq++;

            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;

            error_log("====2=====$status======");
        }

        $sql = "UPDATE blood_borrow_item SET
                a_qty_get = `a_qty_get`+$a_qty,
                b_qty_get = `b_qty_get`+$b_qty,
                o_qty_get = `o_qty_get`+$o_qty,
                ab_qty_get = `ab_qty_get`+$ab_qty,
                cryo_qty_get = `cryo_qty_get`+$cryo_qty
                WHERE bloodborrowitemid = '$bloodborrowitemid'

        ";

        $result = mysqli_query($conn, $sql);

        if(empty($result))
        $status = false;

        error_log("====3=====$status======");

    }

    error_log("====update=====$update======");

    if($update == false)
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
                        bloodstockpaymainid,
                        bloodstockmaincode,
                        bloodstockmaindate,
                        bloodstockmaintime,
                        bloodstockmaintypecross,
                        bloodstockmainrfid,
                        bloodstockmainbagnumber,
                        pickupofficer,
                        bloodstockmainamount,
                        donatebloodtypeid,
                        bloodstockmaincreate
                    )
                    value
                    (
                        '$bloodstockmainid',
                        '$bloodstockpaymainid',
                        '$bloodstockmaincode',
                        '$bloodstockdate',
                        '$bloodstocktime',
                        '$bloodstockmaintypecross',
                        '$bloodstockmainrfid',
                        '$bloodstockmainbagnumber',
                        '$pickupofficer',
                        '$bloodstockmainamount',
                        '2',
                        '$username'
                        
                    )
                ";

            $result = mysqli_query($conn, $sql);

            if(empty($result))
            $status = false;

            error_log("====4=====$status======");

        }
    }else
    {
        error_log("******update******");
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

        error_log("====5=====$status======");
    }

if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'id' => $bloodstockmainid
    )
);


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