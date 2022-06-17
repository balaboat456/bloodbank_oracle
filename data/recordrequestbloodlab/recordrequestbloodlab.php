<?php
    include('../../connection.php');
    include('../dateFormat.php');
    

    $condition = '';
    $hn =$_GET['hn'];
    $an =$_GET['an'];
    $fromtime =$_GET['fromtime'];
    $totime =$_GET['totime'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    
    

    $fromln =$_GET['fromln'];
    $toln =$_GET['toln'];

    $labunitroomid =$_GET['labunitroomid'];
    $checkresultbloodstatusid =$_GET['checkresultbloodstatusid'];
    $fullname =$_GET['fullname'];


    if(!empty($hn))
    $condition = $condition." AND PT.patienthn = '$hn' AND IFNULL(PT.patienthn,'') != ''  ";

    if(!empty($an))
    $condition = $condition." AND PT.patientan = '$an' AND IFNULL(PT.patientan,'') != ''  ";

    if(!empty($checkresultbloodstatusid))
    $condition = $condition." AND CR.checkresultbloodstatusid = '$checkresultbloodstatusid'  ";

    if(!empty($labunitroomid))
    $condition = $condition." AND CR.labunitroomid = '$labunitroomid'  ";

    if(!empty($fullname))
    $condition = $condition." AND PT.patientfullname LIKE '%$fullname%'  ";

    if(!empty($fromdate) && !empty($todate))
    {
        $fromdate = dmyToymd($fromdate);
        $todate = dmyToymd($todate);
        $fromdate = $fromdate.''.$fromtime.':00';
        $todate = $todate.''.$totime.':59';
        $condition = $condition." AND DATE_FORMAT(CR.labsenddatetime, '%Y-%m-%d %h:%i:%s') BETWEEN '$fromdate' AND '$todate' ";
    }

    if(!empty($fromln) && !empty($toln))
    {
        $condition = $condition." AND CR.labid BETWEEN '$fromln' AND '$toln' ";
    }

    $sql = "SELECT 	CR.*,
                PT.patientfullname,
                PT.patientan,
                PT.patienthn,
                PT.patientidcard,
                UN.labunitname,
                ST.checkresultbloodstatusname,
                JT.labjobtypename,
                UR.labunitroomname,
                DT.doctorname,
                RS.reasonsendingname,
                MR.maintenancerightname,
                DL.labdeliveryname,
                DATE_FORMAT(CR.labsenddatetime, '%d/%m/%Y %H:%i') as formt_datetime_labsenddatetime
            FROM lab_check_request CR 
            LEFT JOIN patient PT ON CR.patientid = PT.patientid
            LEFT JOIN lab_unit UN ON CR.labunitid = UN.labunitid
            LEFT JOIN lab_checkresultbloodstatus ST ON CR.checkresultbloodstatusid = ST.checkresultbloodstatusid
            LEFT JOIN lab_jobtype JT ON CR.labjobtypeid = JT.labjobtypeid
            LEFT JOIN lab_unit_room UR ON CR.labunitroomid = UR.labunitroomid
            LEFT JOIN doctor DT ON CR.doctorid = DT.doctorid
            LEFT JOIN lab_reasonsending RS ON CR.reasonsendingid = RS.reasonsendingid
            LEFT JOIN maintenance_right MR ON CR.maintenancerightid = MR.maintenancerightid
            LEFT JOIN lab_delivery DL ON CR.labdeliveryid = DL.labdeliveryid
            WHERE IFNULL(CR.checkresultbloodstatusid,'')  not in ('0','') 
            $condition
            ORDER BY CR.labcheckrequestid DESC";

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