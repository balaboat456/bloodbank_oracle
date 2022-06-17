<?php
    include('../../connection.php');
    include('../pagination.php');

    $condition = '';
    $select = "BBR.*,RT.receivingtypename2,HT.hospitalname,PT.patientfullname ";
    $selectcount = " count(*) countpage ";
    
    $activePage = $_GET['activepage'];
    $numRows = $_GET['numrows'];

    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $bloodborrowhn = $_GET['bloodborrowhn'];
    $receivingtypeid = $_GET['receivingtypeid'];
    $hospitalid = $_GET['hospitalid'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND BBR.bloodborrowdate BETWEEN '$fromdate' AND '$todate' ";
   

    if(!empty($bloodborrowhn) )
    $condition = $condition." AND BBR.bloodborrowhn = '$bloodborrowhn' ";

    if(!empty($receivingtypeid) && $receivingtypeid != 'null')
    $condition = $condition." AND BBR.receivingtypeid = '$receivingtypeid' ";

    if(!empty($hospitalid) && $hospitalid != 'null')
    $condition = $condition." AND BBR.hospitalid = '$hospitalid' ";

    $sqlcount = condition($selectcount,$condition);
    
    $querycount = mysqli_query($conn,$sqlcount);


    $resultcount = mysqli_fetch_array($querycount);
    $pagination = paginationCompress(intval($resultcount['countpage']),$activePage,$numRows);

    $start = $pagination['start'];
    $numrow = $pagination['num_rows'];
    
    $sql = condition($select,$condition);
    $sql = $sql." LIMIT $start,$numrow ";
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
            'pagination' => $pagination
        )
        
    );

    mysqli_close($conn);

    function condition($select,$condition)
    {
        return "SELECT $select
    FROM blood_borrow BBR
    LEFT JOIN receiving_type RT ON BBR.receivingtypeid = RT.receivingtypeid
    LEFT JOIN hospital HT ON BBR.hospitalid = HT.hospitalid
    LEFT JOIN patient PT ON BBR.bloodborrowhn = PT.patienthn
    WHERE true $condition
    ORDER BY BBR.bloodborrowid DESC";
    }


?>