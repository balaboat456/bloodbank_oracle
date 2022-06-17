<?php
    include('../connection.php');

    $condition = '';
    $fromdatetime =$_GET['fromdatetime'];
    $todatetime =$_GET['todatetime'];
    $usercreate =$_GET['usercreate'];

    if(!empty($usercreate))
    $condition = " AND BEX.staff = '$usercreate' ";

    $sql = "SELECT 	
    ROW_NUMBER() OVER (ORDER By BEX.bloodexchangeid DESC) AS num_row ,
    BEX.* ,
                PT.patientfullname,
                PT.patientan,
                PT.patienthn,
                BG.bloodgroupname,
                RH.rhname3,
                DT.doctorname,
                MAC.exchangemachinename,
                TY.bloodexchangetypename,
                UF.unitofficename,
                BEXT.bloodexchangetypename,
                CONCAT(S.name,' ',S.surname) AS usercreatename
                
            FROM blood_exchange BEX
            LEFT JOIN blood_exchange_type BEXT ON BEX.bloodexchangetypeid  = BEXT.bloodexchangetypeid 
            LEFT JOIN patient PT ON BEX.patientid = PT.patientid
            LEFT JOIN blood_group BG ON BEX.bloodgroupid = BG.bloodgroupid
            LEFT JOIN unit_office UF ON BEX.unitofficeid = UF.unitofficeid
            LEFT JOIN rh RH ON BEX.rhid = RH.rhid
            LEFT JOIN doctor DT ON BEX.doctorid = DT.doctorid
            LEFT JOIN blood_exchange_machine MAC ON BEX.exchangemachineid = MAC.exchangemachineid
            LEFT JOIN blood_exchange_type TY ON BEX.bloodexchangetypeid = TY.bloodexchangetypeid
            LEFT JOIN staff S ON BEX.staff = S.id
            WHERE BEX.active <> 0
            AND CONCAT(BEX.bloodexchangedate,' ',BEX.bloodexchangetime) BETWEEN '$fromdatetime' AND '$todatetime'
            $condition
            ORDER BY BEX.bloodexchangeid DESC";
 
    
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
            'sql' => $sql
        )
        
    );

    mysqli_close($conn);
?>