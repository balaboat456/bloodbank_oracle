<?php
    include('../../connection.php');

    $condition = '';
    $barcode =$_GET['barcode'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $fromnumber =$_GET['fromnumber'];
    $tonumber =$_GET['tonumber'];
    $bloodstatus =$_GET['bloodstatus'];
    $rfid = $_GET['rfid'];
  
    if(!empty($barcode))
    {
        $condition = $condition." AND DN.bag_number = '$barcode' ";
    }else if(!empty($rfid))
    {
        $condition = $condition." AND ((DN.prcrfid like '%$rfid%') OR (DN.lprcrfid like '%$rfid%') OR (DN.ldprcrfid like '%$rfid%') OR (DN.sdrrfid like '%$rfid%') )";
    }else if(!empty($fromnumber) && !empty($tonumber))
    {
        $condition = $condition." AND DN.bag_number between '$fromnumber' AND '$tonumber' ";
    }else if(!empty($bloodstatus) && $bloodstatus != 'null')
    {
        $condition = $condition." AND DN.bloodstatusid = '$bloodstatus' ";
    }else if(!empty($fromdate) && !empty($todate))
    {
        $condition = $condition." AND DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate' ";
    }
    

    $sql = "SELECT DN.*,
    DR.donorcode,
    DR.donoridcard,
    DR.donorbirthday,
    DR.donorage,
    DR.donoroccupation,
    DR.donortelhome,
    DR.donormobile,
    DR.genderid,
    DR.prefixid,
    DR.fname,
    DR.lname,
    DR.address,
    DR.countryid,
    DR.provinceid,
    DR.districtid,
    DR.subdistrictid,
    DR.zipcode,
    DR.souvenirid,
    DR.blood_group As blood_group1,
    DR.rh AS rh1,
    ST.donatestatusname,
    BT.bagtypename,
    BT.PRC,
    BT.LPRC,
    BT.LDPRC,
    BT.FFP,
    BT.PC,
    BT.SDP,
    BT.SDR,
    BT.WB,
    BT.LPPC,
    BT.LPPC_PAS,
    BT.SDP_PAS,
    BT.CRP,
    BT.CRYO,
    RH2.rhcode as rhcode_raj2
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN donatestatus ST ON DN.donation_status = ST.donatestatusid
LEFT JOIN bag_type BT ON DN.bag_type_id = BT.bagtypeid
LEFT JOIN rh RH2 ON DN.rh_raj = RH2.rhid
WHERE DN.donation_status = 1 
$condition
ORDER BY DN.bag_number ASC";
 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>