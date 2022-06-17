<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];
    $hn =$_GET['hn'];
    $donoridcard =$_GET['donoridcard'];

    if(!empty($keyword))
    $condition = $condition." AND CONCAT(   ifnull(DN.fname,''),' ',
                                ifnull(DN.lname,''),' ',
                                ifnull(DN.donoridcard,''),' ',
                                ifnull(DN.donorpassport,''),' ',
                                ifnull(DN.donorcode,'')) LIKE '%$keyword%' ";

    
    if(!empty($hn))
    $condition = $condition." AND REPLACE(DN.donorcode,'-','') = REPLACE('$hn','-','') ";

    // if(!empty($donoridcard))
    // $condition = $condition." AND DN.donoridcard = '$donoridcard' ";

    if(!empty($donoridcard))
    $keyword = $donoridcard;

    // $sql = "SELECT MAX(DT.donateid),DT.bag_number,DT.donation_status,DN.* , 
    //             BG.bloodgroupname , 
    //             IFNULL(RH.rhname3,'') AS rhname3, 
    //             SRH.rhname3 AS antibodyscreeningname
    //         FROM donor DN
    //         LEFT JOIN blood_group BG ON DN.blood_group = BG.bloodgroupid
    //         LEFT JOIN rh RH ON DN.rh = RH.rhid
    //         LEFT JOIN rh SRH ON DN.antibodysceening = SRH.rhid
    //         LEFT JOIN (SELECT * FROM donate ORDER BY donation_date DESC) DT ON DN.donorid = DT.donorid
    //         WHERE true
    //         $condition 
    //         GROUP BY DT.donorid
    //         ORDER BY DT.donateid DESC,DT.donation_date DESC,DN.fname DESC		
    //         LIMIT 50";

    $resultArray = array();

    if(!empty($keyword))
    {
        $sql = "SELECT *,MAX(donation_date) AS max_donation_date,(CURRENT_DATE() + INTERVAL +543 YEAR) AS DATE_NOW
        FROM
            (
            SELECT
            
                DT.donateid,
                DT.bag_number,
                DT.donation_status,
                MAX(DT.donation_date) AS donation_date,
                substring_index(group_concat(DT.donation_type_id ORDER BY DT.donation_date DESC), ',', 1) AS donation_type_id,
                DN.*,
                PF.prefixname,
                BG.bloodgroupname,
                IFNULL( RH.rhname3, '' ) AS rhname3,
                SRH.rhname3 AS antibodyscreeningname 
            FROM
                donor DN
                LEFT JOIN donate DT ON DN.donorid = DT.donorid
                LEFT JOIN blood_group BG ON DN.blood_group = BG.bloodgroupid
                LEFT JOIN rh RH ON DN.rh = RH.rhid
                LEFT JOIN rh SRH ON DN.antibodysceening = SRH.rhid 
                LEFT JOIN prefix PF ON DN.prefixid = PF.prefixid
            WHERE
            
            TRUE 
                AND CONCAT(
                    ifnull( DN.fname, '' ),
                    ' ',
                    ifnull( DN.lname, '' ),
                    ' ',
                    ifnull( DN.donoridcard, '' ),
                    ' ',
                    ifnull( DN.donorpassport, '' ),
                    ' ',
                ifnull( DN.donorcode, '' )) LIKE '%$keyword%' 
            GROUP BY
                DT.donorid
            ORDER BY
            DT.donateid DESC,
                DT.donation_date DESC,
                DN.fname DESC 
                LIMIT 50 
            ) ddt 
        GROUP BY
            ddt.donorid 
        
        ";

        $query = mysqli_query($conn,$sql);
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
    }

    
    error_log($sql);
  
    
	
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>