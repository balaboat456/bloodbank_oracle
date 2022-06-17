<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    $notid =$_GET['notid'];

    if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(donateformremarktypecode,''),' ',ifnull(donateformremarktypename,'')) LIKE '%$keyword%' ";

    if(!empty($notid))
    $condition = "AND donateformremarktypeid != '$notid' ";

    $sql = "SELECT * FROM donate_form_remark_type WHERE true $condition ";
    
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