<?php
    include('../../connection.php');

    $condition = '';
    $id =$_GET['id'];
    $bloodtype =$_GET['bloodtype'];
    $bag_number =$_GET['bagnumber'];
    $rfid =$_GET['rfid'];
    $bloodstocktypeagitemid =$_GET['bloodstocktypeagitemid'];

    if(!empty($id))
    $condition = $condition." AND TAGI.bloodstocktypeagid = '$id' " ;

    if(!empty($bloodtype) && !empty($bag_number))
    $condition = $condition." AND BS.bloodtype = '$bloodtype' AND BS.bag_number = '$bag_number' ";

    if(!empty($rfid))
    $condition = $condition." AND BS.bloodstockrfid = '$rfid'  ";

    if(!empty($bloodstocktypeagitemid))
    $condition = $condition." AND TAGI.bloodstocktypeagitemid = '$bloodstocktypeagitemid'  ";


    $sql = "SELECT 	TAGI.bloodstocktypeagitemid ,
                TAGI.bloodstocktypeagitemcode,
                TAGI.bloodstocktypeagid,
                TAGI.bloodstockid,
                TAG.bloodstocktypeagname,
                TAG.bloodstocktypeagphon,
                BS.bloodtype,
                BS.bag_number,
                BS.bloodgroup,
                BS.volume,
                BS.phenotype,
                BS.sub,
                DATE_FORMAT(BS.bloodexp, '%d/%m/%Y') AS bloodexp, 
                BS.bloodstockrfid,
                RH.rhname3
            FROM bloodstock_type_ag_item TAGI
            LEFT JOIN bloodstock_type_ag TAG ON TAGI.bloodstocktypeagid = TAG.bloodstocktypeagid
            LEFT JOIN bloodstock BS ON TAGI.bloodstockid = BS.bloodstockid AND BS.active <> 0
            LEFT JOIN rh RH ON BS.bloodrh = RH.rhid
            WHERE TAGI.active <> 0
            $condition
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
            'data' => $resultArray
        )
    );

    mysqli_close($conn);
?>