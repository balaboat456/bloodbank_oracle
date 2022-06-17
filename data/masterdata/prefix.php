<?php
    include('../../connection.php');

    $condition = '';
    $isIDcardPassport =$_GET['isIDcardPassport'];
    $genderid =$_GET['genderid'];
    $keyword =$_GET['keyword'];

    if($isIDcardPassport != '2')
    {
        $condition = $condition." AND PF.prefixid NOT IN (4,5,6) ";
    }

    if($isIDcardPassport == '2')
    {
        $condition = $condition." AND PF.prefixid IN (4,5,6) ";
    }else if(!empty($keyword))
    $condition = "AND CONCAT(ifnull(PF.prefixid,''),' ',ifnull(PF.prefixcode,''),' ',ifnull(PF.prefixname,'')) LIKE '%$keyword%' ";

    if(!empty($genderid))
    $condition = $condition." AND (PF.genderid = '$genderid' OR PF.genderid = 0 ) ";

    $sql = "SELECT PF.* ,GD.gendername
            FROM prefix PF
            LEFT JOIN gender GD ON PF.genderid = GD.genderid
            WHERE PF.active <> 0  $condition 
            ORDER BY PF.prefixid ";
    
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