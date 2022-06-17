<?php
    include('../../connection.php');
    include('../dateFormat.php');
    

    $condition = '';
    $hn =$_GET['hn'];
    $an =$_GET['an'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $requestunit =$_GET['requestunit'];
    $checkresultbloodstatusid =$_GET['checkresultbloodstatusid'];


    if(!empty($hn))
    $condition = $condition." AND PT.patienthn = '$hn' AND IFNULL(PT.patienthn,'') != ''  ";

    if(!empty($an))
    $condition = $condition." AND PT.patientan = '$an' AND IFNULL(PT.patientan,'') != ''  ";

    if(!empty($checkresultbloodstatusid))
    $condition = $condition." AND CR.checkresultbloodstatusid = '$checkresultbloodstatusid'  ";

    if(!empty($fromdate) && !empty($todate))
    {
        $fromdate = dmyToymd($fromdate);
        $todate = dmyToymd($todate);
        $condition = $condition." AND DATE_FORMAT(CR.labsenddatetime, '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate' ";
    }
    

    $sql = "SELECT 	CR.*,
                PT.patientfullname,
                PT.patientan,
                PT.patienthn,
                PT.patientidcard,
                UN.labunitname,
                ST.checkresultbloodstatusname,
                JT.labjobtypename,
                UR.unitofficename AS labunitroomname,
                DT.doctorname,
                RS.reasonsendingname,
                MR.maintenancerightname,
                DL.labdeliveryname,
                DATE_FORMAT(CR.labsenddatetime, '%d/%m/%Y %H:%i') as formt_datetime_labsenddatetime
            FROM lab_check_request CR 
            LEFT JOIN lab_check_request_item IM ON CR.labcheckrequestid = IM.labcheckrequestid
            LEFT JOIN patient PT ON CR.patientid = PT.patientid
            LEFT JOIN lab_unit UN ON CR.labunitid = UN.labunitid
            LEFT JOIN lab_checkresultbloodstatus ST ON CR.checkresultbloodstatusid = ST.checkresultbloodstatusid
            LEFT JOIN lab_jobtype JT ON CR.labjobtypeid = JT.labjobtypeid
            LEFT JOIN unit_office UR ON CR.labunitroomid = UR.unitofficeid
            LEFT JOIN doctor DT ON CR.doctorid = DT.doctorid
            LEFT JOIN lab_reasonsending RS ON CR.reasonsendingid = RS.reasonsendingid
            LEFT JOIN maintenance_right MR ON CR.maintenancerightid = MR.maintenancerightid
            LEFT JOIN lab_delivery DL ON CR.labdeliveryid = DL.labdeliveryid
            WHERE IFNULL(CR.checkresultbloodstatusid,'')  not in ('0','') 
            AND IFNULL(IM.labcheckrequestid,'') != ''
            $condition
            GROUP BY CR.labcheckrequestid
            ORDER BY CR.labsenddatetime DESC";


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