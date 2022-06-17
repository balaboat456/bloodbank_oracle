<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];

    $sql = "SELECT 	
BLL.* ,
                UO.unitofficename,
                DT.doctorname,
                BT.bagtypename,
                PT.patientfullname,
                BTP.lettingproblemname,
                S.name,
				S2.name AS user_before_name,
				S3.name AS user_after_name
            FROM blood_letting BLL
            LEFT JOIN patient PT ON BLL.patientid = PT.patientid
            LEFT JOIN unit_office UO ON BLL.unitofficeid = UO.unitofficeid
            LEFT JOIN doctor DT ON BLL.doctorid = DT.doctorid
            LEFT JOIN bag_type BT ON BLL.bagtypeid = BT.bagtypeid
            LEFT JOIN blood_letting_problems BTP ON BLL.lettingproblemid = BTP.lettingproblemid
            LEFT JOIN staff S ON BLL.usercreate = S.id
						LEFT JOIN staff S2 ON BLL.user_before = S2.id
						LEFT JOIN staff S3 ON BLL.user_after = S3.id
            WHERE BLL.active <> 0
            AND PT.patienthn = '$hn'
            ORDER BY BLL.bloodlettingid DESC";
 
    
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