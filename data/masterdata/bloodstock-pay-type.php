<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $grouptypeid =$_GET['grouptypeid'];

    if(!empty($keyword))
    $condition = $condition." AND CONCAT(IFNULL(bloodstockpaytypecode,''),' ',
                              IFNULL(bloodstockpaytypename,'')) LIKE  '%$keyword%' ";

    if(!empty($grouptypeid))
    $condition = $condition." AND grouptypeid =  '$grouptypeid' ";

    $sql = "SELECT * FROM bloodstock_pay_type WHERE true $condition " ;
    
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