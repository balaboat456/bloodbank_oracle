<?php
    include('../../connection.php');

    $condition = '';
    $donatebloodtypeid =$_GET['donatebloodtypeid'];
    $condnot =$_GET['condnot'];
    $keyword =$_GET['keyword'];
    $hospitalid =$_GET['hospitalid'];

    if(!empty($keyword))
    $condition = $condition."AND CONCAT(ifnull(receivingtypecode,''),' ',ifnull(receivingtypename,'')) LIKE '%$keyword%' ";

    if(isset($donatebloodtypeid))
    if(!empty($donatebloodtypeid))
    $condition = $condition."AND donatebloodtypeid = '$donatebloodtypeid' ";


    if(isset($condnot))
    if(!empty($condnot))
    $condition = $condition."AND donatebloodtypeid != '$condnot' ";

    if(isset($hospitalid))
    if(!empty($hospitalid))

    if($hospitalid == 1 || $hospitalid == 2){
        
        $condition = $condition."AND receivingtypeid NOT IN (11) ";
    
    }else if($hospitalid != 1 || $hospitalid != 2){

        $condition = $condition."AND receivingtypeid IN (5,6,11,12,13) ";
    }
    
    
    $sql = "SELECT * FROM receiving_type where true $condition  ORDER BY receivingtypeid";
    
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