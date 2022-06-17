<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    // $sql = "SELECT 	BEX.* ,
    //             PT.patientfullname,
    //             PT.patientan,
    //             BG.bloodgroupname,
    //             RH.rhname3,
    //             DT.doctorname,
    //             MAC.exchangemachinename,
    //             TY.bloodexchangetypename,
    //             UF.unitofficename
                
    //         FROM blood_exchange BEX
    //         LEFT JOIN patient PT ON BEX.patientid = PT.patientid
    //         LEFT JOIN blood_group BG ON BEX.bloodgroupid = BG.bloodgroupid
    //         LEFT JOIN unit_office UF ON BEX.unitofficeid = UF.unitofficeid
    //         LEFT JOIN rh RH ON BEX.rhid = RH.rhid
    //         LEFT JOIN doctor DT ON BEX.doctorid = DT.doctorid
    //         LEFT JOIN blood_exchange_machine MAC ON BEX.exchangemachineid = MAC.exchangemachineid
    //         LEFT JOIN blood_exchange_type TY ON BEX.bloodexchangetypeid = TY.bloodexchangetypeid
    //         WHERE BEX.active <> 0
    //         AND PT.patienthn = '$hn'
    //         ORDER BY BEX.bloodexchangeid DESC";

            $sql = "SELECT
            RB.requestunit , UN.unitofficename,
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
                WHERE RB.hn = '$hn' AND RBC.confirmbloodrequestdate = DATE_ADD(curdate(), INTERVAL 543 YEAR)
                AND RBC.bloodtype IN('FFP','LPPC','LPPC(PAS)','SDP','SDP(PAS)','LDPPC','LDPPC_PAS','CRP')
            ORDER BY RBC.bag_number";
    
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