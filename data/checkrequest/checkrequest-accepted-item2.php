<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];


    $sql = "SELECT LC.labcheckrequest_a_user , LC.labcheckrequest_v_user ,
    IM.* ,LM.labformname,LM.labformcode 
            FROM lab_check_request_item IM
            LEFT JOIN labform LM ON IM.labformid = LM.labformid
            LEFT JOIN lab_check_request LC ON LC.labcheckrequestid = IM.labcheckrequestid
            WHERE IM.active <> 0
    AND IM.labcheckrequestid = '$id'
    GROUP BY LM.labformname,LM.labformcode";
    
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