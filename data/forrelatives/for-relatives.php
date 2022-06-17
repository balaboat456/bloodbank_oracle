<?php
    include('../../connection.php');

    $condition = '';
    $hn =$_GET['hn'];
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    if(!empty($hn))
    $condition = $condition." AND DN.hn = '$hn' ";

    // $sql = "SELECT 
    //             DN.donateid,
    //             GROUP_CONCAT(DISTINCT DN.donateid SEPARATOR ',') AS group_donateid,
    //             DN.donation_date,
    //             DN.bag_number,
    //             DN.hn,
    //             DN.patientname,
    //             DN.blood_group,
    //             UF.unitofficename,
    //             count(*) AS count_item,
    //             GROUP_CONCAT(DISTINCT DATE_FORMAT(DN.donation_date,'%d/%m/%Y') SEPARATOR ', ') AS date_fromdate
    //         FROM donate DN
    //         LEFT JOIN unit_office UF ON DN.unitofficeid = UF.unitofficeid
    //         WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
    //         AND DN.donation_get_type_id = 2 
    //         $condition
    //         GROUP BY DN.hn";
    $sql = "SELECT DN.donateid AS group_donateid,
                    DN.donation_date AS date_fromdate,
                    DN.bag_number,
                    DN.hn,
                    DN.patientname,
                    DN.blood_group,
                    count(*) AS count_item
            FROM donate DN
            LEFT JOIN unit_office UF ON DN.unitofficeid = UF.unitofficeid
            WHERE  DN.donation_date BETWEEN '$fromdate' AND '$todate'
             AND DN.donation_get_type_id = 2 
             $condition
            GROUP BY DN.hn,
            DN.donation_date"; 
    
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