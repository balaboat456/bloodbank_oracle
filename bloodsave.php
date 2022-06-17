<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
include('connection.php');
include('data/running.php');
include('data/dateFormat.php');
include('dateNow.php');
include('data/replacestring.php');
include('checkPermission.php');

if(!checkPermission("BK_COMPONENTS","ED")) 
{
    echo '';
    return false;
}

$logtext = json_encode($_POST,JSON_UNESCAPED_UNICODE);
$dateNowValue = date("Y-m-d H:i:s") ;
$username = $_SESSION['username'];

mysqli_query($conn,"INSERT INTO log_data(logtext,logdatetime,loguser,loggroup,loggrouppage) values ('$logtext','$dateNowValue','$username','blood-donor-record-list2','บันทึกแยกส่วนประกอบเลือด')");

$barcode = $_POST['barcode'];
$fromdate =$_POST['fromdate'];
$todate =$_POST['todate'];
$fromnumber =$_POST['fromnumber'];
$tonumber =$_POST['tonumber'];
$bloodstatus =$_POST['bloodstatus'];
$rfid =$_POST['rfid'];

$bloodstockmaincreate = $_POST['bloodstockmaincreate'];

$count =$_POST['countblood2'];
$status = 1;
mysqli_autocommit($conn, FALSE);
$date = trim(dmyToymd(dateNowDMY()));
$time = date("H:i");
$staffid = $_SESSION['staffid'];


for ($i = 0; $i < $count; $i++) {


    $condition = "";
    $donateid = $_POST["donateid$i"];

    $prc = $_POST["prc$i"];
    if(!empty($prc))
    $condition = $condition."prc='$prc',";

    $prcexp =  dmyToymd($_POST["prcexp$i"]);
    if(!empty($prcexp))
    $condition = $condition."prcexp='$prcexp',";

    $prcrfid = $_POST["prcrfid$i"];
    if(!empty($prcrfid))
    $condition = $condition."prcrfid='$prcrfid',";

    $prcremark = (!empty($_POST["prcremark$i"]))?$_POST["prcremark$i"]:0 ;
    if(!empty($prcremark))
    $condition = $condition."prcremark='$prcremark',";

    $lprc = $_POST["lprc$i"];
    if(!empty($lprc))
    $condition = $condition."lprc='$lprc',";

    // $lprcexp = dmyToymd($_POST["lprcexp$i"]);
    // if(!empty($lprcexp))
    // $condition = $condition."lprcexp='$lprcexp',";

    $lprcrfid = $_POST["lprcrfid$i"];
    if(!empty($lprcrfid))
    $condition = $condition."lprcrfid='$lprcrfid',";

    $lprcremark = (!empty($_POST["lprcremark$i"]))?$_POST["lprcremark$i"]:0;
    if(!empty($lprcremark))
    $condition = $condition."lprcremark='$lprcremark',";

    $ldprc = $_POST["ldprc$i"];
    if(!empty($ldprc))
    $condition = $condition."ldprc='$ldprc',";

    $ldprcrfid = $_POST["ldprcrfid$i"];
    if(!empty($ldprcrfid))
    $condition = $condition."ldprcrfid='$ldprcrfid',";

    $ldprcremark = (!empty($_POST["ldprcremark$i"]))?$_POST["ldprcremark$i"]:0;
    if(!empty($ldprcremark))
    $condition = $condition."ldprcremark='$ldprcremark',";

    $ffp = $_POST["ffp$i"];
    if(!empty($ffp))
    $condition = $condition."ffp='$ffp',";

    $ffpexp =  dmyToymd($_POST["ffpexp$i"]);
    if (!empty($ffpexp))
    $condition = $condition . "ffpexp='$ffpexp',";

    $ffprfid = $_POST["ffprfid$i"];
    if(!empty($ffprfid))
    $condition = $condition."ffprfid='$ffprfid',";

    $ffpremark = (!empty($_POST["ffpremark$i"]))? $_POST["ffpremark$i"]:0;
    if(!empty($ffpremark))
    $condition = $condition."ffpremark='$ffpremark',";

    $pc = $_POST["pc$i"];
    if(!empty($pc))
    $condition = $condition."pc='$pc',";

    $pcrfid = $_POST["pcrfid$i"];
    if(!empty($pcrfid))
    $condition = $condition."pcrfid='$pcrfid',";


    $pcremark = (!empty( $_POST["pcremark$i"]))? $_POST["pcremark$i"]:0;
    if(!empty($pcremark))
    $condition = $condition."pcremark='$pcremark',";

    $sdp = $_POST["sdp$i"];
    if(!empty($sdp))
    $condition = $condition."sdp='$sdp',";

    $sdprfid = $_POST["sdprfid$i"];
    if(!empty($sdprfid))
    $condition = $condition."sdprfid='$sdprfid',";

    $sdpremark = (!empty($_POST["sdpremark$i"]))?$_POST["sdpremark$i"]:0 ;
    if(!empty($sdpremark))
    $condition = $condition."sdpremark='$sdpremark',";

    $sdp_pas = $_POST["sdp_pas$i"];
    if(!empty($sdp_pas))
    $condition = $condition."sdp_pas='$sdp_pas',";

    $sdp_pasrfid = $_POST["sdp_pasrfid$i"];
    if(!empty($sdp_pasrfid))
    $condition = $condition."sdp_pasrfid='$sdp_pasrfid',";

    $sdp_pasremark = (!empty($_POST["sdp_pasremark$i"]))?$_POST["sdp_pasremark$i"]:0 ;
    if(!empty($sdp_pasremark))
    $condition = $condition."sdp_pasremark='$sdp_pasremark',";

    $sdp_sdp_pas_1 = (isset($_POST["sdp_sdp_pas_1$i"]))?$_POST["sdp_sdp_pas_1$i"]:'';
    if(!empty($sdp_sdp_pas_1))
    $condition = $condition."sdp_sdp_pas_1='$sdp_sdp_pas_1',";

    $sdp_pas_pas_2 = (isset($_POST["sdp_pas_pas_2$i"]))?$_POST["sdp_pas_pas_2$i"]:'';
    if(!empty($sdp_pas_pas_2))
    $condition = $condition."sdp_pas_pas_2='$sdp_pas_pas_2',";

    $sdr = $_POST["sdr$i"];
    if(!empty($sdr))
    $condition = $condition."sdr='$sdr',";

    $sdrrfid = $_POST["sdrrfid$i"];
    if(!empty($sdrrfid))
    $condition = $condition."sdrrfid='$sdrrfid',";

    $sdrremark = (!empty($_POST["sdrremark$i"]))?$_POST["sdrremark$i"]:0 ;
    if(!empty($sdrremark))
    $condition = $condition."sdrremark='$sdrremark',";

    $wb = $_POST["wb$i"];
    if(!empty($wb))
    $condition = $condition."wb='$wb',";

    $wbrfid = $_POST["wbrfid$i"];
    if(!empty($wbrfid))
    $condition = $condition."wbrfid='$wbrfid',";

    $wbremark = (!empty($_POST["wbremark$i"]))?$_POST["wbremark$i"]:0 ;
    if(!empty($wbremark))
    $condition = $condition."wbremark='$wbremark',";

    $crp = $_POST["crp$i"];
    if(!empty($crp))
    $condition = $condition."crp='$crp',";

    $crprfid = $_POST["crprfid$i"];
    if(!empty($crprfid))
    $condition = $condition."crprfid='$crprfid',";

    $crpremark = (!empty($_POST["crpremark$i"]))?$_POST["crpremark$i"]:0 ;
    if(!empty($crpremark))
    $condition = $condition."crpremark='$crpremark',";

    $cryo = $_POST["cryo$i"];
    if(!empty($cryo))
    $condition = $condition."cryo='$cryo',";

    $cryoexp =  dmyToymd($_POST["cryoexp$i"]);
    if (!empty($cryoexp))
    $condition = $condition . "cryoexp='$cryoexp',";

    $cryorfid = $_POST["cryorfid$i"];
    if(!empty($cryorfid))
    $condition = $condition."cryorfid='$cryorfid',";

    $cryoremark = (!empty($_POST["cryoremark$i"]))?$_POST["cryoremark$i"]:0 ;
    if(!empty($cryoremark))
    $condition = $condition."cryoremark='$cryoremark',";

    $lppc = $_POST["lppc$i"];
    if(!empty($lppc))
    $condition = $condition."lppc='$lppc',";

    $lppcrfid = $_POST["lppcrfid$i"];
    if(!empty($lppcrfid))
    $condition = $condition."lppcrfid='$lppcrfid',";

    $lppcremark = (!empty($_POST["lppcremark$i"]))?$_POST["lppcremark$i"]:0 ;
    if(!empty($lppcremark))
    $condition = $condition."lppcremark='$lppcremark',";

    $pc_1 = (isset($_POST["pc_1$i"]))?$_POST["pc_1$i"]:'';
    if(!empty($pc_1))
    $condition = $condition."pc_1='$pc_1',";

    $pc_2 = (isset($_POST["pc_2$i"]))?$_POST["pc_2$i"]:'';
    if(!empty($pc_2))
    $condition = $condition."pc_2='$pc_2',";

    $pc_3 = (isset($_POST["pc_3$i"]))?$_POST["pc_3$i"]:'';
    if(!empty($pc_3))
    $condition = $condition."pc_3='$pc_3',";

    $pc_4 = (isset($_POST["pc_4$i"]))?$_POST["pc_4$i"]:'';
    if(!empty($pc_4))
    $condition = $condition."pc_4='$pc_4',";

    $ffp_5 = (isset($_POST["ffp_5$i"]))?$_POST["ffp_5$i"]:'';
    if(!empty($ffp_5))
    $condition = $condition."ffp_5='$ffp_5',";

    
    $lppc_pas = $_POST["lppc_pas$i"];
    if(!empty($lppc_pas))
    $condition = $condition."lppc_pas='$lppc_pas',";

    $lppc_pasrfid = $_POST["lppc_pasrfid$i"];
    if(!empty($lppc_pasrfid))
    $condition = $condition."lppc_pasrfid='$lppc_pasrfid',";

    $lppc_pasremark = (!empty($_POST["lppc_pasremark$i"]))?$_POST["lppc_pasremark$i"]:0 ;
    if(!empty($lppc_pasremark))
    $condition = $condition."lppc_pasremark='$lppc_pasremark',";

    $pc_lppc_pas_1 = (isset($_POST["pc_lppc_pas_1$i"]))?$_POST["pc_lppc_pas_1$i"]:'';
    if(!empty($pc_lppc_pas_1))
    $condition = $condition."pc_lppc_pas_1='$pc_lppc_pas_1',";

    $pc_lppc_pas_2 = (isset($_POST["pc_lppc_pas_2$i"]))?$_POST["pc_lppc_pas_2$i"]:'';
    if(!empty($pc_lppc_pas_2))
    $condition = $condition."pc_lppc_pas_2='$pc_lppc_pas_2',";

    $pc_lppc_pas_3 = (isset($_POST["pc_lppc_pas_3$i"]))?$_POST["pc_lppc_pas_3$i"]:'';
    if(!empty($pc_lppc_pas_3))
    $condition = $condition."pc_lppc_pas_3='$pc_lppc_pas_3',";

    $pc_lppc_pas_4 = (isset($_POST["pc_lppc_pas_4$i"]))?$_POST["pc_lppc_pas_4$i"]:'';
    if(!empty($pc_lppc_pas_4))
    $condition = $condition."pc_lppc_pas_4='$pc_lppc_pas_4',";

    $pas_lppc_companypasid = (isset($_POST["pas_lppc_companypasid$i"]))?$_POST["pas_lppc_companypasid$i"]:'';
    if(!empty($pas_lppc_companypasid))
    $condition = $condition."pas_lppc_companypasid='$pas_lppc_companypasid',";

    $pas_lppc_lot_no = (isset($_POST["pas_lppc_lot_no$i"]))?$_POST["pas_lppc_lot_no$i"]:'';
    if(!empty($pas_lppc_lot_no))
    $condition = $condition."pas_lppc_lot_no='$pas_lppc_lot_no',";

    $pas_sdp_companypasid = (isset($_POST["pas_sdp_companypasid$i"]))?$_POST["pas_sdp_companypasid$i"]:'';
    if(!empty($pas_sdp_companypasid))
    $condition = $condition."pas_sdp_companypasid='$pas_sdp_companypasid',";

    $pas_sdp_lot_no = (isset($_POST["pas_sdp_lot_no$i"]))?$_POST["pas_sdp_lot_no$i"]:'';
    if(!empty($pas_sdp_lot_no))
    $condition = $condition."pas_sdp_lot_no='$pas_sdp_lot_no',";



    $rubberbandnumber = $_POST["rubberbandnumber$i"];
    if(!empty($rubberbandnumber))
    $condition = $condition."rubberbandnumber='$rubberbandnumber',";

    $bloodstatusid = $_POST["bloodstatusid$i"];

    if($bloodstatusid == 1 && (!empty($prc) || !empty($lprc) || !empty($ffp) || !empty($pc) || !empty($lppc) || !empty($lppc_pas) || !empty($sdp) || !empty($sdp_pas) || !empty($sdr) || !empty($wb) || !empty($crp) || !empty($cryo)))
    $condition = $condition."bloodstatusid='2',";

   $sql = " UPDATE donate
            SET $condition
            donateid = '$donateid'
            WHERE donateid = '$donateid' ";

    $result =  mysqli_query($conn, $sql);

    if(empty($result))
    $status = 0;


    if( (empty($prc) && empty($lprc) && empty($ffp) && empty($pc) && empty($lppc) && empty($lppc_pas) && empty($sdp) && empty($sdp_pas) && empty($sdr) && empty($wb)  && empty($crp)  && empty($cryo)))
    {
        $sql = " UPDATE donate
                SET bloodstatusid='1'
                WHERE donateid = '$donateid' ";

        $result =  mysqli_query($conn, $sql);

        if(empty($result))
        $status = 0;
    }    

    
} 


//============== start save stock =====================
$stockcross = json_decode($_POST['stockConfirmArr']);

$running = getRunningYM('SK');
$bloodstockmainid = $running['runn'];
$bloodstockmaincode = $running['code'];
$seq = 1;

$bloodstockmaintypecross = "";
$bloodstockmainrfid = "";
$bloodstockmainbagnumber = "";

$bloodstockmainamount = 0;

foreach ($stockcross as $item) {
    
    $bloodstockmainamount++;

    $running = getRunningYM('ST');
    $bloodstockid = $running['runn'];
    $bloodstockcode = $running['code'];
    $hospitalid = "";
    $bloodstocktypecross = $item->bloodstocktypecross;
    $bag_number = $item->bag_number;
    $bloodstockrfid = substr($item->bloodstockrfid,0,24); 
    

    $sub = $item->sub;
    $rubberbandnumber = $item->rubberbandnumber;
    $bloodgroup = $item->bloodgroup;
    $bloodrh = $item->bloodrh;
    $volume = $item->volume;
    $bloodstart = dmyToymd($item->bloodstart);
    $bloodexp = dmyToymd($item->bloodexp);
    $bagtypeid = $item->bagtypeid;
    $antibody = $item->antibody;
    $phenotype = $item->phenotype;
    $donateid = $item->donateid;
    $donorid = $item->donorid;

    $bloodstockmaintypecross = $bloodstockmaintypecross.$bloodstocktypecross.',';
    $bloodstockmainrfid = $bloodstockmainrfid.$bloodstockrfid.',';
    $bloodstockmainbagnumber = $bloodstockmainbagnumber.$bag_number.',';


    $sql = "DELETE FROM bloodstock WHERE bag_number = '$bag_number' AND bloodtype = '$bloodstocktypecross' AND sub = $sub";

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    $sql = "UPDATE  bloodstock SET 
    bloodstockrfid = ''
    WHERE bloodstockrfid = '$bloodstockrfid' AND bloodstockrfid != ''
    ";

    error_log("--------bloodstock--------");
    error_log($sql);

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


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
                volume,
                bloodstart,
                bloodexp,
                bagtypeid,
                antibody,
                phenotype,
                donateid,
                donorid
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
                '$volume',
                '$bloodstart',
                '$bloodexp',
                '$bagtypeid',
                '$antibody',
                '$phenotype',
                '$donateid',
                '$donorid'
                
            )
        ";
    $seq++;

    error_log($sql);

    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;

    $condition = "";
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

    if($bloodstocktypecross == 'CRP')
    $condition = "crpused = '1'";

    if($bloodstocktypecross == 'CRYO')
    $condition = "cryoused = '1'";

    $sql = "UPDATE donate SET $condition WHERE donateid = '$donateid'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

}

$bloodstockmaintypecross = laststring($bloodstockmaintypecross);
$bloodstockmainrfid = laststring($bloodstockmainrfid);
$bloodstockmainbagnumber = laststring($bloodstockmainbagnumber);


if($bloodstockmainamount > 0)
{
    $sql = "INSERT INTO bloodstock_main
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
            donatebloodtypeid,
            bloodstockmaincreate
        )
        value
        (
            '$bloodstockmainid',
            '$bloodstockmaincode',
            '$date',
            '$time',
            '$bloodstockmaintypecross',
            '$bloodstockmainrfid',
            '$bloodstockmainbagnumber',
            '$staffid',
            '$bloodstockmainamount',
            '1',
            '$bloodstockmaincreate'
        )
    ";

    error_log($sql);

    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;
}


//============== end save stock =======================




//============== start save infect =====================
$infectcross = json_decode($_POST['stockInfectArr']);

$bloodstockmaintypecross = "";
$bloodstockmainrfid = "";
$bloodstockmainbagnumber = "";


foreach ($infectcross as $item) {
    

    $bloodstockmainamount++;

    $running = getRunningYM('ST');
    $bloodstockid = $running['runn'];
    $bloodstockcode = $running['code'];
    $hospitalid = "";
    $bloodstocktypecross = $item->bloodstocktypecross;
    $bag_number = $item->bag_number;
    $bloodstockrfid = ''; 
    
    $sub = '1';
    $rubberbandnumber = '';
    $bloodgroup = $item->bloodgroup;
    $bloodrh = $item->bloodrh;
    $volume = $item->volume;
    $bloodstart = dmyToymd($item->bloodstart);
    $bloodexp = dmyToymd($item->bloodexp);
    $bagtypeid = $item->bagtypeid;
    $antibody = '';
    $phenotype = '';
    $donateid = $item->donateid;
    $donorid = $item->donorid;

    $bloodstockmaintypecross = $bloodstockmaintypecross.$bloodstocktypecross.',';
    $bloodstockmainrfid = '';
    $bloodstockmainbagnumber = $bloodstockmainbagnumber.$bag_number.',';


    $sql = "DELETE FROM bloodstock WHERE bag_number = '$bag_number' AND bloodtype = '$bloodstocktypecross' AND sub = $sub";

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

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
                volume,
                bloodstart,
                bloodexp,
                bagtypeid,
                antibody,
                phenotype,
                donateid,
                donorid,
                bloodstockstatusid
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
                '$volume',
                '$bloodstart',
                '$bloodexp',
                '$bagtypeid',
                '$antibody',
                '$phenotype',
                '$donateid',
                '$donorid',
                '7'
                
            )
        ";
    $seq++;

    error_log($sql);

    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;


    $condition = "";
    if($bloodstocktypecross == 'PRC')
    $condition = "prcinfect = '1'";

    if($bloodstocktypecross == 'LPRC')
    $condition = "lprcinfect = '1'";

    if($bloodstocktypecross == 'LDPRC')
    $condition = "ldprcinfect = '1'";

    if($bloodstocktypecross == 'FFP')
    $condition = "ffpinfect = '1'";

    if($bloodstocktypecross == 'PC')
    $condition = "pcinfect = '1'";

    if($bloodstocktypecross == 'LPPC')
    $condition = "lppcinfect = '1'";

    if($bloodstocktypecross == 'SDP')
    $condition = "sdpinfect = '1'";

    if($bloodstocktypecross == 'SDR')
    $condition = "sdrinfect = '1'";

    if($bloodstocktypecross == 'WB')
    $condition = "wbinfect = '1'";

    if($bloodstocktypecross == 'LPPC_PAS')
    $condition = "lppc_pasinfect = '1'";

    if($bloodstocktypecross == 'SDP_PAS')
    $condition = "sdp_pasinfect = '1'";

    if($bloodstocktypecross == 'CRP')
    $condition = "crpinfect = '1'";

    if($bloodstocktypecross == 'CRYO')
    $condition = "cryoinfect = '1'";

    $sql = "UPDATE donate SET $condition WHERE donateid = '$donateid'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    error_log($sql);

  

}

//============== end save infect =======================


//============== start save Remark =====================
$remarkcross = json_decode($_POST['stockRemarkArr']);

$bloodstockmaintypecross = "";
$bloodstockmainrfid = "";
$bloodstockmainbagnumber = "";

foreach ($remarkcross as $item) {
    

    $bloodstockmainamount++;

    $running = getRunningYM('ST');
    $bloodstockid = $running['runn'];
    $bloodstockcode = $running['code'];
    $hospitalid = "";
    $bloodstocktypecross = $item->bloodstocktypecross;
    $bag_number = $item->bag_number;
    $bloodstockrfid = ''; 
    
    $sub = '1';
    $rubberbandnumber = '';
    $bloodgroup = $item->bloodgroup;
    $bloodrh = $item->bloodrh;
    $volume = $item->volume;
    $bloodstart = dmyToymd($item->bloodstart);
    $bloodexp = dmyToymd($item->bloodexp);
    $bagtypeid = $item->bagtypeid;
    $antibody = '';
    $phenotype = '';
    $donateid = $item->donateid;
    $donorid = $item->donorid;
    $bloodremarkid = '';

    $bloodstockmaintypecross = $bloodstockmaintypecross.$bloodstocktypecross.',';
    $bloodstockmainrfid = '';
    $bloodstockmainbagnumber = $bloodstockmainbagnumber.$bag_number.',';


    $sql = "DELETE FROM bloodstock WHERE bag_number = '$bag_number' AND bloodtype = '$bloodstocktypecross' AND sub = $sub";

    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;


    $sql = "SELECT * FROM donate where donateid = '$donateid' ";
    
    $query = mysqli_query($conn,$sql);

	while($result = mysqli_fetch_array($query))
	{
		if($bloodstocktypecross == 'PRC')
        $bloodremarkid = $result['prcremark']; 

        if($bloodstocktypecross == 'LPRC')
        $bloodremarkid = $result['lprcremark'];  

        if($bloodstocktypecross == 'LDPRC')
        $bloodremarkid = $result['ldprcremark']; 

        if($bloodstocktypecross == 'FFP')
        $bloodremarkid = $result['ffpremark']; 

        if($bloodstocktypecross == 'PC')
        $bloodremarkid = $result['pcremark']; 

        if($bloodstocktypecross == 'LPPC')
        $bloodremarkid = $result['lppcremark']; 

        if($bloodstocktypecross == 'SDP')
        $bloodremarkid = $result['sdpremark'];

        if($bloodstocktypecross == 'SDR')
        $bloodremarkid = $result['sdrremark']; 

        if($bloodstocktypecross == 'WB')
        $bloodremarkid = $result['wbremark']; 

        if($bloodstocktypecross == 'LPPC_PAS')
        $bloodremarkid = $result['lppc_pasremark']; 

        if($bloodstocktypecross == 'SDP_PAS')
        $bloodremarkid = $result['sdp_pasremark'];

        if($bloodstocktypecross == 'CRP')
        $bloodremarkid = $result['crpremark'];

        if($bloodstocktypecross == 'CRYO')
        $bloodremarkid = $result['cryoremark']; 
	}


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
                volume,
                bloodstart,
                bloodexp,
                bagtypeid,
                antibody,
                phenotype,
                donateid,
                donorid,
                bloodremarkid,
                bloodstockstatusid
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
                '$volume',
                '$bloodstart',
                '$bloodexp',
                '$bagtypeid',
                '$antibody',
                '$phenotype',
                '$donateid',
                '$donorid',
                '$bloodremarkid',
                '8'
                
            )
        ";
    $seq++;

    error_log($sql);

    $result = mysqli_query($conn, $sql);

    if(empty($result))
    $status = false;


    $condition = "";
    if($bloodstocktypecross == 'PRC')
    $condition = "prcisremark = '1'";

    if($bloodstocktypecross == 'LPRC')
    $condition = "lprcisremark = '1'";

    if($bloodstocktypecross == 'LDPRC')
    $condition = "ldprcisremark = '1'";

    if($bloodstocktypecross == 'FFP')
    $condition = "ffpisremark = '1'";

    if($bloodstocktypecross == 'PC')
    $condition = "pcisremark = '1'";

    if($bloodstocktypecross == 'LPPC')
    $condition = "lppcisremark = '1'";

    if($bloodstocktypecross == 'SDP')
    $condition = "sdpisremark = '1'";

    if($bloodstocktypecross == 'SDR')
    $condition = "sdrisremark = '1'";

    if($bloodstocktypecross == 'WB')
    $condition = "wbisremark = '1'";

    if($bloodstocktypecross == 'LPPC_PAS')
    $condition = "lppc_pasisremark = '1'";

    if($bloodstocktypecross == 'SDP_PAS')
    $condition = "sdp_pasisremark = '1'";

    if($bloodstocktypecross == 'CRP')
    $condition = "crpisremark = '1'";

    if($bloodstocktypecross == 'CRYO')
    $condition = "cryoisremark = '1'";

    $sql = "UPDATE donate SET $condition WHERE donateid = '$donateid'";
    $result = mysqli_query($conn, $sql);
    if(empty($result))
    $status = false;

    error_log($sql);


  

}

//============== end save Remark =======================




if ($status) {
    mysqli_commit($conn);
    $_SESSION['status'] = 'successful';
    echo json_encode(
        array(
        'status' => $status,
        'url' => "blood-donor-record-list2.php?barcode=$barcode&fromdate=$fromdate&todate=$todate&fromnumber=$fromnumber&tonumber=$tonumber&bloodstatus=$bloodstatus&rfid=$rfid"
        )
       
    )  ;
}else
{
    mysqli_rollback($conn);
    $_SESSION['status'] = 'error';
}

function updateStock($donateid,$bloodtype,$bloodstockrfid,$rubberbandnumber,$volume,$bloodexp)
{
    include('connection.php');

    $sql = "    UPDATE bloodstock SET 
                bloodstockrfid='$bloodstockrfid',
                rubberbandnumber='$rubberbandnumber',
                volume='$volume',
                bloodexp='$bloodexp'
            WHERE donateid = '$donateid' AND bloodtype = '$bloodtype'
            
        ";
    return $sql;


}


 



?>