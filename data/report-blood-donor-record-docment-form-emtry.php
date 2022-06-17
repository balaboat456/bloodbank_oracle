<?php
    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    $sql = "SELECT DFE.*,
    US.fullname,
DATE_FORMAT(DFE.datereport,'%d/%m/%Y') AS datereport ,
DATE_FORMAT(DFE.datecheck,'%d/%m/%Y') AS datecheck ,
CASE WHEN formtype = 1 THEN 'ส่งตรวจปกติ'
		WHEN formtype = 2 THEN 'ส่งตรวจซ้ำ'
		ELSE '' END AS typeform
FROM donor_form_emtry DFE
JOIN users US ON US.username = DFE.usercreate
WHERE DFE.datereport BETWEEN '$fromdate' AND '$todate'
ORDER BY DFE.datereport ASC
    ";
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
