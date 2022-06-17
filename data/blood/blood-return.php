<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND CM.bloodsavedate_return BETWEEN '$fromdate' AND '$todate' ";

    if(!empty($hn))
    $condition = $condition." AND RB.hn =  '$hn' ";

    $sql = "SELECT CM.* ,
            RH.rhname3,
            BT.bloodstocktypename2,
            RB.hn,
            RB.an,
            RB.fn,
            RB.vn,
            RB.prvno,
            RB.insuranceid,
            RB.insurancetext,
            RB.requestunit,
            UF.unitofficename,
            US.fullname,
            PT.patientfullname,
            DT.doctorcode2
    FROM request_blood_crossmacth CM
    LEFT JOIN rh RH ON CM.rhid = RH.rhid
    LEFT JOIN bloodstock_type BT ON CM.bloodtype = BT.bloodstocktypeid 
    LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
    LEFT JOIN doctor DT ON RB.doctorid = DT.doctorid
    LEFT JOIN unit_office UF	ON RB.requestunit = UF.unitofficeid
    LEFT JOIN users US ON CM.username_return = US.username
    LEFT JOIN patient PT ON PT.patienthn = RB.hn
    WHERE CM.requestbloodreturnstatusid = 2
    AND CM.isautocontrol != 1
    $condition
    ORDER BY CM.blooddate_return,CM.bloodtime_return DESC"
    ;
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }
    

    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>