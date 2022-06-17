<?php
    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    $sql = "SELECT ROW_NUMBER() OVER (ORDER By BS.bag_number) AS num_row ,
    BS.hospitalid,
		RT.receivingtypeid,
		BS.bloodgroup,
    HL.hospitalname,
    DATE_FORMAT(BM.bloodstockmaindate,'%d/%m/%Y') AS bloodstockmaindate,
    BS.bag_number,
    RT.receivingtypename,
		BT.bloodstocktypeid ,
    BT.bloodstocktypename2,
    HL.hospitalname
    FROM bloodstock BS
    LEFT JOIN bloodstock_main BM ON BS.bloodstockmainid = BM.bloodstockmainid
    LEFT JOIN hospital HL ON BS.hospitalid = HL.hospitalid
    LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
    LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
    WHERE BM.bloodstockmaindate BETWEEN '$fromdate' AND '$todate'
    AND BS.active = 1
		AND BS.hospitalid = 0
		AND RT.receivingtypeid = 10
		AND BT.bloodstocktypeid = 'FFP'
    ORDER BY BS.bag_number
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
                'data' => $resultArray,
                'sql' => $sql
            )
            
        );
    
        mysqli_close($conn);
    ?>