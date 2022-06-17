<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['requestbloodcrossmacthlogmainid'];
   

    $sql = "SELECT LO.* ,
                RT.bloodgroupserumname AS bloodgroupserumname_rt,
                RT.bloodgroupserumname AS bloodgroupserumname_37c,
                IAT.bloodgroupserumname AS bloodgroupserumname_iat,
                CCC.bloodgroupserumname AS bloodgroupserumname_ccc,
                CAT.bloodgroupserumname AS bloodgroupserumname_cat,
                RH.rhcode,
                CR.crossmacthresultname,
                ST.crossmacthstatusname,
                DT.doctorname,
                CONCAT(SF.gender,SF.name,' ',SF.surname) AS staff_name
            FROM request_blood_crossmacth_log LO
            LEFT JOIN blood_group_serum_crossmacth RT ON LO.ctt_rt = RT.bloodgroupserumid
            LEFT JOIN blood_group_serum_crossmacth C37 ON LO.ctt_37c = C37.bloodgroupserumid
            LEFT JOIN blood_group_serum_crossmacth IAT ON LO.ctt_iat = IAT.bloodgroupserumid
            LEFT JOIN blood_group_serum_crossmacth CCC ON LO.ctt_ccc = CCC.bloodgroupserumid
            LEFT JOIN blood_group_serum_crossmacth CAT ON LO.ctt_ccc = CAT.bloodgroupserumid
            LEFT JOIN crossmacth_result CR ON LO.crossmacthresultid = CR.crossmacthresultid
            LEFT JOIN crossmacth_status ST ON LO.crossmacthstatusid = ST.crossmacthstatusid
            LEFT JOIN rh RH ON LO.rhid = RH.rhid
            LEFT JOIN doctor DT ON LO.doctorid = DT.doctorid
            LEFT JOIN staff SF ON LO.isbloodpreparation = SF.id
            WHERE LO.requestbloodcrossmacthlogmainid = '$id'";
    
    $query = mysqli_query($conn,$sql);

    error_log($sql);

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