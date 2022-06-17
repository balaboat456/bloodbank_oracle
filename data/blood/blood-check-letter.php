<?php
    include('../../connection.php');

    $condition = '';
    $condition2 = '';
    $type =$_GET['type'];

    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND DT.donation_date BETWEEN '$fromdate' AND '$todate' ";

    if(strpos($type,"tpharpr") != "")
    {
        $condition2 = $condition2." OR DT.tpharpr = '+' ";
    }
    
    if(strpos($type,"hcv") != "")
    {
        $condition2 = $condition2." OR DT.hcvab = '+' ";
    }
    
    if(strpos($type,"nat") != "")
    {
        $condition2 = $condition2." OR CONCAT(IFNULL(DT.hbvdna,''),IFNULL(DT.hcvrna,''),IFNULL(DT.hivrna,'')) LIKE '%+%' ";
    }
    
    if(strpos($type,"hiv") != "")
    {
        $condition2 = $condition2." OR DT.hivagab = '+' ";
    }
    
    if(strpos($type,"hbsag") != "")
    {
        $condition2 = $condition2." OR DT.hbsag = '+' ";
    }


    $sql = "SELECT DT.*,DR.donorcode,CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname,
    PV.provinceth,DR.donoremail,DR.donorage,DR.blood_group
    FROM donate DT
    LEFT JOIN donor DR ON DT.donorid = DR.donorid
    LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
    LEFT JOIN provinces PV ON DR.provinceid = PV.provinceid
    WHERE true
    $condition
    AND ( false $condition2 )
    ORDER BY DT.donateid"
    ;
 
    
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
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>