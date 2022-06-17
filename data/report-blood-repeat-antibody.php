<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    $sql = "SELECT 
    ROW_NUMBER() OVER (ORDER By DN.donateid) AS num_row ,
REPLACE(GROUP_CONCAT(CASE WHEN DAS.donateantisceentest IN (1,2,13,3,4,5,6,7,8) THEN BAT.bloodantiname
ELSE '' END),',',' ')  AS repeatt_2,
REPLACE(GROUP_CONCAT(CASE WHEN DAS.donateantisceentest IN (9,14,10,11,12) THEN BAT.bloodantiname
ELSE '' END),',',' ')  AS repeatt_1,
DN.donorid ,
DAS.donateantisceenid ,
DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS donation_date, -- อัน 1
DN.bloodrhsceen_cross , -- 2
DN.tubeantibodyscreeningtest , -- 3
CASE WHEN DATE_FORMAT(DN.dateantibodyscreeningtest,'%d/%m/%Y') = '00/00/0000' THEN ''
ELSE DATE_FORMAT(DN.dateantibodyscreeningtest,'%d/%m/%Y') END AS dateantibodyscreeningtest ,
DN.bag_number , -- 5
DN.blood_group , -- 6
DN.rh , -- 7
RH.rhname3 , -- 7
DN.bloodrhsceen_cross_c , -- 8
GROUP_CONCAT(DAS.donateantisceentest) AS group_donateantisceentest,
BAT.bloodantiname , -- 9 10
-- DN.bloodrh_sceen , -- 11
BGS.bloodgroupserumname AS  bloodrh_sceen , -- 11
DN.donateantibody , -- 12
DN.donatephenotype , -- 12
DN.blood_invest_remark  -- 13
FROM donate DN
LEFT JOIN donate_anti_sceen DAS ON DAS.donateid = DN.donateid
LEFT JOIN blood_anti_test BAT ON BAT.bloodantiid = DAS.donateantisceentest
LEFT JOIN rh RH ON RH.rhid = DN.rh
LEFT JOIN blood_group_serum_lab BGS ON BGS.bloodgroupserumid = DN.bloodrh_sceen
WHERE DN.donation_date BETWEEN '$fromdate' AND '$todate'
AND DN.donation_status = 1 
AND DN.bloodrhsceen_cross = 'Rh+'
GROUP BY DN.donateid
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
