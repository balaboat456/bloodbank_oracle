<?php
    include('../connection.php');
    include('dateFormat.php');

    $condition = '';
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];

    

    $sql = "SELECT
                    M.formatbloodstockpaydatetime,
                    M.hospitalid,
                                    HT.hospitalname,
                    M.bloodtype,
                    M.bloodgroup,
                    SUM(M.sum_bloodgroup) AS sum_bloodgroup,
                    SUM(M.sum_get_bloodgroup) AS sum_get_bloodgroup,
                    TY.bloodstocktypename2
                FROM
                (SELECT 
                    
                    DATE_FORMAT(bloodstockpaydatetime,'%Y-%m-%d') AS formatbloodstockpaydatetime,
                    hospitalid,
                    bloodtype,
                    bloodgroup,
                    COUNT(*) AS sum_bloodgroup,
                    0 AS sum_get_bloodgroup

                FROM bloodstock_pay
                WHERE bloodstockpaytypeid = '7'
                AND DATE_FORMAT(bloodstockpaydatetime,'%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
                GROUP BY hospitalid,DATE_FORMAT(bloodstockpaydatetime,'%Y-%m-%d'),bloodtype,bloodgroup,hospitalid

                UNION

                SELECT 	MN.bloodstockmaindate AS formatbloodstockpaydatetime,
                    SK.hospitalid,
                    SK.bloodtype,
                    SK.bloodgroup,
                    0 AS sum_bloodgroup,
                    COUNT(*) AS sum_get_bloodgroup
                FROM bloodstock SK
                LEFT JOIN bloodstock_main  MN ON SK.bloodstockmainid = MN.bloodstockmainid
                WHERE SK.receivingtypeid = '11'
                AND SK.bloodstockpaygroupdate BETWEEN '$fromdate' AND '$todate'
                GROUP BY SK.hospitalid,MN.bloodstockmaindate,SK.bloodtype,SK.bloodgroup,SK.hospitalid
                ) M
                LEFT JOIN bloodstock_type TY ON M.bloodtype = TY.bloodstocktypeid
                            LEFT JOIN hospital HT ON M.hospitalid = HT.hospitalid
                GROUP BY M.hospitalid,M.bloodtype
                ORDER BY M.hospitalid DESC,M.bloodtype DESC ";
    
    $query = mysqli_query($conn,$sql);

    error_log($sql);

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