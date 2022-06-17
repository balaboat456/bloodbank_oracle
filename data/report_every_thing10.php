<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $hospitalid =$_GET['hospitalid'];

    if($hospitalid == ''){
        $hospital = '';
    }
    else{
        $hospital = "AND HL.hospitalid LIKE '$hospitalid'";
    }
    
    $sql = "SELECT BS.hospitalid,
    HL.hospitalname,
    DATE_FORMAT(BM.bloodstockmaindate,'%d/%m/%Y') AS bloodstockmaindate,
    RT.receivingtypename,
    BT.bloodstocktypename2,
    HL.hospitalname,
    COUNT(BS.bloodtype) AS countbloodtype
    FROM bloodstock BS
    LEFT JOIN bloodstock_main BM ON BS.bloodstockmainid = BM.bloodstockmainid
    LEFT JOIN hospital HL ON BS.hospitalid = HL.hospitalid
    LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
    LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
    WHERE BM.bloodstockmaindate BETWEEN '$fromdate' AND '$todate'
    AND BS.active = 1
    $hospital
    GROUP BY BS.hospitalid,BS.receivingtypeid,REPLACE(BS.bloodtype, '-O', '')
    ORDER BY BS.hospitalid,BM.bloodstockmaindate,BS.receivingtypeid,BS.bloodtype
";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';
	while($row = mysqli_fetch_array($query))
	{
        $number += 1;
		$data.= "<tr>";
        $data.= "<td>" . $row['bloodstockmaindate'] . "</td>";
    $data .= "<td class=" . $text . ">" . $row['hospitalname'] . "</td>";
        $data.= "<td class=".$text.">" . $row['receivingtypename'] . "</td>";
        $data.= "<td class=".$text.">" . $row['bloodstocktypename2'] . "</td>";
        $data.= "<td>" . $row['countbloodtype'] . "</td>";
        $data.= "</tr>";
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $data
        )
        
    );

    // echo $data;
    mysqli_close($conn);
?>
