<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];


// $sql = "SELECT 	CR.*,
//             PT.patientfullname,
//             PT.patientan,
//             PT.patienthn,
//             PT.patientidcard,
//             UN.labunitname,
//             ST.checkresultbloodstatusname,
//             JT.labjobtypename,
//             UR.labunitroomname,
//             DT.doctorname,
//             RS.reasonsendingname,
//             MR.maintenancerightname,
//             DL.labdeliveryname,
//             BG.bloodgroupname AS labbloodgroupname,
//             BGM.bloodgroupname AS motherbloodgroupname,
//             RH.rhname3 AS labrhname,
//             RHM.rhname3 AS motherrhname
//         FROM lab_check_request CR 
//         LEFT JOIN patient PT ON CR.patientid = PT.patientid
//         LEFT JOIN lab_unit UN ON CR.labunitid = UN.labunitid
//         LEFT JOIN lab_checkresultbloodstatus ST ON CR.checkresultbloodstatusid = ST.checkresultbloodstatusid
//         LEFT JOIN lab_jobtype JT ON CR.labjobtypeid = JT.labjobtypeid
//         LEFT JOIN lab_unit_room UR ON CR.labunitroomid = UR.labunitroomid
//         LEFT JOIN doctor DT ON CR.doctorid = DT.doctorid
//         LEFT JOIN lab_reasonsending RS ON CR.reasonsendingid = RS.reasonsendingid
//         LEFT JOIN maintenance_right MR ON CR.maintenancerightid = MR.maintenancerightid
//         LEFT JOIN lab_delivery DL ON CR.labdeliveryid = DL.labdeliveryid
//         LEFT JOIN blood_group BG ON CR.labbloodgroupid = BG.bloodgroupid
//         LEFT JOIN blood_group BGM ON CR.motherbloodgroup = BGM.bloodgroupid
//         LEFT JOIN rh RH ON CR.labrhid = RH.rhid 
//         LEFT JOIN rh RHM ON CR.motherrh = RHM.rhid 
//         WHERE PT.patienthn = '$hn' 
//         -- AND IFNULL(PT.patienthn,'') != '' 
//         -- AND IFNULL(CR.checkresultbloodstatusid,'')  in ('0','')
//         ORDER BY CR.labcheckrequestid DESC";

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
                BG.bloodgroupname,
                RH.rhname3,
                BGM.bloodgroupname AS mombloodgroupname,
                RHM.rhname3 AS momrhname3,
                CN.labcheckrequestcancelname,
                OFF.unitofficeid , OFF.unitofficecode , OFF.unitofficename
            FROM lab_check_request CR 
            LEFT JOIN patient PT ON CR.patientid = PT.patientid
            LEFT JOIN lab_unit UN ON CR.labunitid = UN.labunitid
            LEFT JOIN lab_checkresultbloodstatus ST ON CR.checkresultbloodstatusid = ST.checkresultbloodstatusid
            LEFT JOIN lab_jobtype JT ON CR.labjobtypeid = JT.labjobtypeid
            LEFT JOIN lab_unit_room UR ON CR.labunitroomid = UR.labunitroomid
            LEFT JOIN unit_office OFF ON CR.labunitroomid = OFF.unitofficeid
            LEFT JOIN doctor DT ON CR.doctorid = DT.doctorid
            LEFT JOIN lab_reasonsending RS ON CR.reasonsendingid = RS.reasonsendingid
            LEFT JOIN maintenance_right MR ON CR.maintenancerightid = MR.maintenancerightid
            LEFT JOIN lab_delivery DL ON CR.labdeliveryid = DL.labdeliveryid
            LEFT JOIN blood_group BG ON CR.labbloodgroupid = BG.bloodgroupid
            LEFT JOIN rh RH ON CR.labrhid = RH.rhid
            LEFT JOIN blood_group BGM ON CR.motherbloodgroup = BGM.bloodgroupid
            LEFT JOIN rh RHM ON CR.motherrh = RHM.rhid
            LEFT JOIN lab_check_request_cancel CN ON CR.labcheckrequestcancelid = CN.labcheckrequestcancelid
            WHERE PT.patienthn = '$hn' 
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