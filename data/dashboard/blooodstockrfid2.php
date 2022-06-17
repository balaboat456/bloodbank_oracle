<?php
    include('../../connection.php');
    include('../replacestring.php');

    $sql="select count(*) as total FROM bloodstock WHERE bloodstockstatusid in (1)  ";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($result);

        $sql="SELECT 
                SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) prc,
                SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc,
                SUM(CASE WHEN bs.bloodtype = 'LPRC-O' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc_o,
                SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldprc,
                
                SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdr,
                SUM(CASE WHEN bs.bloodtype = 'LDSDR' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldsdr,
                SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) pc,
                SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc,
                
                SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc_pas,
                SUM(CASE WHEN bs.bloodtype = 'LDPPC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldppc,
                SUM(CASE WHEN bs.bloodtype = 'LDPPC_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldppc_pas,
                SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp,
                SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp_pas,
                
                SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ffp,
                SUM(CASE WHEN bs.bloodtype = 'CRP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) crp,
                SUM(CASE WHEN bs.bloodtype = 'HTFDC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) htfdc,
                SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) cryo,
                
                SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) wb


            FROM bloodstock bs 
            WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) AND bs.active <> 0  )";
            $result=mysqli_query($con,$sql);
            $data2=mysqli_fetch_assoc($result);


            $sql="SELECT 	bg.bloodgroupid AS label ,
            COUNT(*) AS `value`
            FROM blood_group bg
            LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup AND bs.active <> 0
            WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) ) 
            AND bs.bloodgroup in ('A','B','O','AB') AND bs.bloodrh NOT IN ('Rh-')
            GROUP BY bg.bloodgroupid
            
            UNION
            
            SELECT 	'Rh-' AS label ,
            COUNT(*) AS `value`
            FROM bloodstock bs 
            WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) ) 
            AND  bloodrh IN ('Rh-')
            AND bs.active <> 0
            UNION
            
            SELECT 	'CRYO' AS label ,
            COUNT(*) AS `value`
            FROM bloodstock bs 
            WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) ) 
            AND bs.bloodtype = 'CRYO'
            AND bs.active <> 0
            UNION
            SELECT 	'Other' AS label ,
            COUNT(*) AS `value`
            FROM bloodstock bs 
            WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) ) 
            AND bs.bloodgroup not in ('A','B','O','AB') AND bs.bloodrh NOT IN ('Rh-') AND  bs.bloodtype != 'CRYO'
            AND bs.active <> 0
            ORDER BY FIELD(label,'A') DESC,FIELD(label,'B') DESC,FIELD(label,'O') DESC,FIELD(label,'AB') DESC ,FIELD(label,'Rh-') DESC,FIELD(label,'CRYO') DESC";
            $query=mysqli_query($con,$sql);

            $resultArray1 = array();
            while($result = mysqli_fetch_array($query))
            {
                array_push($resultArray1,$result);
            }

    echo json_encode(
        array(
            'status' => true,
            'total1' => $data["total"],
            'data2' => $data2,
            'data3' => $resultArray1,
        )
        
    );

    mysqli_close($conn);



?>