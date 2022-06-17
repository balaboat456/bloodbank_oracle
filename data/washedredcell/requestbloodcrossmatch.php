<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $requestbloodid = $_GET['requestbloodid'];


    $sql = "SELECT
   CONCAT(DATE_FORMAT(RB.usedblooddatefrom , '%d/%m/%Y'),' - ',DATE_FORMAT(RB.usedblooddateto, '%d/%m/%Y')) as usedblooddate,
UN.unitofficeid AS requestunit , UN.unitofficename,
RB.requestblooddate,
RB.requestbloodtime,
RBC.wash_status , RBC.wash_status_remark,
DOC.doctorid , DOC.doctorname,
RB.diagnosis , RB.diagnosisdetail,
	RB.requestbloodid,
	RB.hn, PA.patientid,
	RBC.bag_number, RBC.bloodgroupid,
	RBC.rhid,RH.rhname3,
	RBC.bloodtype,
	BS.volume, 
	RBC.crossmacthstatusid, CS.crossmacthstatusname,
	RBC.requestbloodcrossmacthdatetime,
	RBC.isbloodpreparation,
	SS.name , SS.surname
FROM request_blood_crossmacth RBC
JOIN request_blood RB ON RB.requestbloodid = RBC.requestbloodid
JOIN bloodstock BS ON BS.bag_number = RBC.bag_number
JOIN staff SS ON SS.id = RBC.isbloodpreparation
JOIN crossmacth_status CS ON CS.crossmacthstatusid = RBC.crossmacthstatusid
JOIN rh RH ON RH.rhid = RBC.rhid
JOIN patient PA ON PA.patienthn = RB.hn
JOIN doctor DOC ON DOC.doctorid = RB.doctorid
JOIN unit_office UN ON UN.unitofficeid = RB.requestunit
WHERE RB.hn = '$hn' 
--  AND RB.requestbloodid = '$requestbloodid' 
/* AND RBC.wash_status = 0 */
ORDER BY RBC.bag_number";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
    // $resultArray =[$hn, $requestbloodid];
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