<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');

    $status = 1;
    mysqli_autocommit($conn, FALSE);
    $username = $_SESSION['username'];
    // start ผู้บริจาค
    $bloodborrowid = $_POST['bloodborrowid'];
    $bloodborrowcode = $_POST['bloodborrowcode'];
    $bloodborrowdate = (!empty($_POST['bloodborrowdate']))?dmyToymd($_POST['bloodborrowdate']):'0000-00-00';
    $bloodborrowtime = $_POST['bloodborrowtime'];
    $hospitalid = (!empty($_POST['hospitalid']))?$_POST['hospitalid']:0;
    $receivingtypeid = (!empty($_POST['receivingtypeid']))?$_POST['receivingtypeid']:0;
    $bloodborrowhn = $_POST['bloodborrowhn'];
$bloodborrowdiagnosiss = $_POST['bloodborrowdiagnosiss'];
    $bloodborrowdiagnosis = $_POST['bloodborrowdiagnosis'];
    $bloodborrowhct = $_POST['bloodborrowhct'];
    $bloodborrowhb = $_POST['bloodborrowhb'];
    $bloodborrowdateused = (!empty($_POST['bloodborrowdateused']))?dmyToymd($_POST['bloodborrowdateused']):'0000-00-00';
    $bloodborrowantigen = $_POST['bloodborrowantigen'];
    $blooddeliveryid = (!empty($_POST['blooddeliveryid']))?$_POST['blooddeliveryid']:0;
    $bloodborrowremark = $_POST['bloodborrowremark'];
    $bloodborrowirradiated = $_POST['bloodborrowirradiated'];
    $bloodborrowhlacrossmatch = $_POST['bloodborrowhlacrossmatch'];
    $bloodborrowhlamatch = $_POST['bloodborrowhlamatch'];
    $bloodborrowfor = $_POST['bloodborrowfor'];
    $bloodborrowurgencyid = (!empty($_POST['bloodborrowurgencyid']))?$_POST['bloodborrowurgencyid']:0;

    $borrowbloodgroup = (!empty($_POST['borrowbloodgroup']))?$_POST['borrowbloodgroup']:'';
    $borrowrh = (!empty($_POST['borrowrh']))?$_POST['borrowrh']:'';

    if($borrowbloodgroup == 'null'){
    $borrowbloodgroup = '';
    }
if ($borrowrh == 'null') {
    $borrowrh = '';
}
$rh = $_POST['rh'];
    $date = dmyToymd(dateNowDMY());
    $time = date("H:i");


$bloodborrowdoctorid = (!empty($_POST['bloodborrowdoctorid'])) ? $_POST['bloodborrowdoctorid'] : 0;

// ติ๊กท้อง
$intrautherinetransfusion = (!empty($_POST['intrautherinetransfusion'])) ? $_POST['intrautherinetransfusion'] : 0;

    // if(empty($bloodborrowhn))
    // $status = 0;

    if(empty($bloodborrowid))
    {
        $running = getRunningYM('BBR');
        $bloodborrowid = $running['runn'];
        $bloodborrowcode = $running['code'];
        $sql = "
        INSERT INTO blood_borrow
        (
            bloodborrowid,
            bloodborrowcode,
            bloodborrowdate,
            bloodborrowtime,
            hospitalid,
            receivingtypeid,
            bloodborrowhn,
            bloodborrowdiagnosis,
            bloodborrowdiagnosiss,
            bloodborrowhct,
            bloodborrowhb,
            bloodborrowdateused,
            bloodborrowantigen,
            blooddeliveryid,
            bloodborrowremark,
            bloodborrowirradiated,
            bloodborrowhlacrossmatch,
            bloodborrowhlamatch,
            bloodborrowfor,
            bloodborrowurgencyid,
            bloodborrowrh,

            borrowbloodgroup,
            borrowrh,

            usersave,
            bloodborrowdoctorid,
            intrautherinetransfusion
        )
        VALUE
        (
            '$bloodborrowid',
            '$bloodborrowcode',
            '$date',
            '$time',
            '$hospitalid',
            '$receivingtypeid',
            '$bloodborrowhn',
            '$bloodborrowdiagnosis',
            '$bloodborrowdiagnosiss',
            '$bloodborrowhct',
            '$bloodborrowhb',
            '$bloodborrowdateused',
            '$bloodborrowantigen',
            '$blooddeliveryid',
            '$bloodborrowremark',
            '$bloodborrowirradiated',
            '$bloodborrowhlacrossmatch',
            '$bloodborrowhlamatch',
            '$bloodborrowfor',
            '$bloodborrowurgencyid',
            '$rh',

            '$borrowbloodgroup',
            '$borrowrh',

            '$username',
            '$bloodborrowdoctorid',
            '$intrautherinetransfusion'
        )
        ";
        
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    }else
    {
        $sql = "UPDATE blood_borrow SET
            bloodborrowdate = '$bloodborrowdate',
            bloodborrowtime = '$bloodborrowtime',
            hospitalid = '$hospitalid',
            receivingtypeid = '$receivingtypeid',
            bloodborrowhn = '$bloodborrowhn',
            bloodborrowdiagnosis = '$bloodborrowdiagnosis',
            bloodborrowdiagnosiss = '$bloodborrowdiagnosiss',
            bloodborrowhct = '$bloodborrowhct',
            bloodborrowhb = '$bloodborrowhb',
            bloodborrowdateused = '$bloodborrowdateused',
            bloodborrowantigen = '$bloodborrowantigen',
            blooddeliveryid = '$blooddeliveryid',
            bloodborrowremark = '$bloodborrowremark',
            bloodborrowirradiated = '$bloodborrowirradiated',
            bloodborrowhlacrossmatch = '$bloodborrowhlacrossmatch',
            bloodborrowhlamatch = '$bloodborrowhlamatch',
            bloodborrowfor = '$bloodborrowfor',
            bloodborrowurgencyid = '$bloodborrowurgencyid',
            bloodborrowdoctorid = '$bloodborrowdoctorid',
            borrowbloodgroup ='$borrowbloodgroup',
            borrowrh = '$borrowrh',
            intrautherinetransfusion = '$intrautherinetransfusion',
            usersave = '$username'
            WHERE bloodborrowid = '$bloodborrowid'
        
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;

    }
    
    $sql = "DELETE FROM blood_borrow_item WHERE bloodborrowid = '$bloodborrowid' ";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $bloodborrowqty = 0;

    if(!empty($bloodborrowid))
    {
        $bloodborrow = json_decode($_POST['bloodborrow']);
    
        foreach ($bloodborrow as $item) {

            
            $im = json_decode($item);
            
            $bloodstocktypeid = (!empty($im[0]->bloodstocktypeid))?$im[0]->bloodstocktypeid:0; 
            $a_qty = (!empty($im[0]->a_qty))?$im[0]->a_qty:0; 
            $b_qty = (!empty($im[0]->b_qty))?$im[0]->b_qty:0; 
            $o_qty = (!empty($im[0]->o_qty))?$im[0]->o_qty:0; 
            $ab_qty = (!empty($im[0]->ab_qty))?$im[0]->ab_qty:0; 
            $cryo_qty = (!empty($im[0]->cryo_qty))?$im[0]->cryo_qty:0;

        $rhaa = (!empty($im[0]->rhaa)) ? $im[0]->rhaa : '';
        $rhbb = (!empty($im[0]->rhbb)) ? $im[0]->rhbb : '';
        $rhoo = (!empty($im[0]->rhoo)) ? $im[0]->rhoo : '';
        $rhab = (!empty($im[0]->rhab)) ? $im[0]->rhab : '';

            $bloodborrowqty = $bloodborrowqty + $a_qty + $b_qty + $o_qty + $ab_qty + $cryo_qty ;
            $total_qty = $a_qty + $b_qty + $o_qty + $ab_qty + $cryo_qty ;

            $sql = "
                    INSERT INTO blood_borrow_item
                    (
                        bloodstocktypeid,
                        a_qty,
                        b_qty,
                        o_qty,
                        ab_qty,
                        cryo_qty,
                        total_qty,
                        bloodborrowid,
                        rhaa,
                        rhbb,
                        rhoo,
                        rhab
                    )
                    value
                    (
                        '$bloodstocktypeid',
                        '$a_qty',
                        '$b_qty',
                        '$o_qty',
                        '$ab_qty',
                        '$cryo_qty',
                        '$total_qty',
                        '$bloodborrowid',
                        '$rhaa',
                        '$rhbb',
                        '$rhoo',
                        '$rhab'
                    )
                ";
            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            
   
        }
    }
    

    $sql = "UPDATE blood_borrow SET
            bloodborrowqty = '$bloodborrowqty'
            WHERE bloodborrowid = '$bloodborrowid'
        ";

        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'id' => $bloodborrowid
    )
);
    
?>