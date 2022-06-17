<?php
    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    $sql = "SELECT 
M.*,
DATE_FORMAT(M.donation_date,'%d/%m/%Y') AS donation_date
FROM
(
SELECT DN.donation_date , DN.bag_number , 'PRC' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.prcremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.prc,0) > 0
AND prcused = 0
AND prcinfect = 0
AND prcisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'LPRC' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.lprcremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.lprc,0) > 0
AND lprcused = 0
AND lprcinfect = 0
AND lprcisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'FFP' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.ffpremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.ffp,0) > 0
AND ffpused = 0
AND ffpinfect = 0
AND ffpisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'PC' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.pcremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.pc,0) > 0
AND pcused = 0
AND pcinfect = 0
AND pcisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'LPPC' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.lppcremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.lppc,0) > 0
AND lppcused = 0
AND lppcinfect = 0
AND lppcisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'LPPC(PAS)' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.lppc_pasremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.lppc_pas,0) > 0
AND lppc_pasused = 0
AND lppc_pasinfect = 0
AND lppc_pasisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'SDP' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.sdpremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.sdp,0) > 0
AND sdpused = 0
AND sdpinfect = 0
AND sdpisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'SDP(PAS)' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.sdp_pasremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.sdp_pas,0) > 0
AND sdp_pasused = 0
AND sdp_pasinfect = 0
AND sdp_pasisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'WB' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.wbremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.wb,0) > 0
AND wbused = 0
AND wbinfect = 0
AND wbisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'LDPRC' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.ldprcremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.ldprc,0) > 0
AND ldprcused = 0
AND ldprcinfect = 0
AND ldprcisremark = 0

UNION

SELECT DN.donation_date , DN.bag_number , 'SDR' AS bloodtype , BR.bloodremarktext AS remark 
FROM donate DN
LEFT JOIN blood_remark BR ON DN.sdrremark = BR.bloodremarkid 
WHERE DATE_FORMAT(DN.donation_date,'%Y-%m-%d') between '$fromdate' AND '$todate'
AND IFNULL(DN.sdr,0) > 0
AND sdrused = 0
AND sdrinfect = 0
AND sdrisremark = 0
) M
ORDER BY donation_date
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