<?php
    include('../../connection.php');

    $id =$_GET['id'];
  
    $sql = "SELECT 
    CASE WHEN IFNULL(BBR.borrowbloodgroup,'') = 'null' THEN '' 
		ELSE IFNULL(BBR.borrowbloodgroup,'') END AS borrowbloodgroup,

		CASE WHEN IFNULL(BBR.borrowrh,'') = 'null' THEN '' 
		ELSE IFNULL(BBR.borrowrh,'') END AS borrowrh,
    BBR.*,
    RT.receivingtypename2,
    HT.hospitalname,
    PT.patientfullname,
    PT.patientgender,
    PT.patientage,
    PT.patientbloodgroup,
    BBU.bloodborrowurgencyname,
    BD.blooddeliveryname,
    DOC.doctorname
    
    FROM blood_borrow BBR
    LEFT JOIN receiving_type RT ON BBR.receivingtypeid = RT.receivingtypeid
    LEFT JOIN hospital HT ON BBR.hospitalid = HT.hospitalid
    LEFT JOIN patient PT ON BBR.bloodborrowhn = PT.patienthn
    LEFT JOIN blood_borrow_urgency BBU ON BBR.bloodborrowurgencyid = BBU.bloodborrowurgencyid
    LEFT JOIN blood_delivery BD ON BBR.blooddeliveryid = BD.blooddeliveryid
    LEFT JOIN doctor DOC ON BBR.bloodborrowdoctorid = DOC.doctorid
    WHERE BBR.bloodborrowid = '$id'
    ORDER BY BBR.bloodborrowid DESC";
 
    error_log($sql);

    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }

    $dataItem = array();
    foreach ($resultArray as $item) {
        array_push($dataItem, array_merge($item,getItem($item['bloodborrowid'])));
    }
    
    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem
        )
        
    );

    mysqli_close($conn);

    function getItem($id)
    {
        include('../../connection.php');

        $sql = "SELECT IM.* ,TY.bloodstocktypename2
                FROM blood_borrow_item IM
                LEFT JOIN bloodstock_type TY ON IM.bloodstocktypeid = TY.bloodstocktypeid
                WHERE IM.bloodborrowid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'item' => $resultArray
        );   

    }
?>