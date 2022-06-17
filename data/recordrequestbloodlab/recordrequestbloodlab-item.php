<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];
    $hn =$_GET['hn'];
    $labformid =$_GET['labformid'];

    if(!empty($id))
    {
        $condition = $condition." AND IM.labcheckrequestid = '$id' ";
    }else if(!empty($labformid) && !empty($hn))
    {
        $condition = $condition." AND IM.labformid = '$labformid' AND PT.patienthn = '$hn' ";
    }else
    {
        $condition = $condition." AND false ";
    }
    

    $sql = "SELECT IM.* ,LM.labformname,LM.labformcode,LM.labtype,DATE_FORMAT(LB.labsenddatetime, '%d/%m/%Y %H:%i') as formt_datetime_labsenddatetime
            FROM lab_check_request_item IM
            LEFT JOIN lab_check_request LB ON IM.labcheckrequestid = LB.labcheckrequestid
            LEFT JOIN patient PT ON LB.patientid = PT.patientid
            LEFT JOIN labform LM ON IM.labformid = LM.labformid
            WHERE IM.active <> 0
            $condition 
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