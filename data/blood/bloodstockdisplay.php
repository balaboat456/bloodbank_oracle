<?php
    include('../../connection.php');

    
    echo json_encode(
        array(
            'status' => true,
            'data1' => stock1(),
            'data2' => stock2(),
            'data3' => stock3(),
            'data4' => stock4(),
            'data5' => stock5(),
            'data5_1' => stock5_1()
        )
        
    );

    mysqli_close($conn);

    function stock1()
    {
        include('../../connection.php');

        $sql = "SELECT bg.bloodgroupname,
        SUM(CASE WHEN (dn.prcused = '0' AND dn.prc != '' AND dn.prc != '0' AND dn.prcremark = '0') THEN 1 ELSE 0 END) prc,
        SUM(CASE WHEN (dn.lprcused = '0' AND dn.lprc != '' AND dn.lprc != '0' AND dn.lprcremark = '0') THEN 1 ELSE 0 END) lprc,
        SUM(CASE WHEN (dn.ldprcused = '0' AND dn.ldprc != '' AND dn.ldprc != '0' AND dn.ldprcremark = '0') THEN 1 ELSE 0 END) ldprc,
        SUM(CASE WHEN (dn.ffpused = '0' AND dn.ffp != '' AND dn.ffp != '0' AND dn.ffpremark = '0') THEN 1 ELSE 0 END) ffp,
        SUM(CASE WHEN (dn.pcused = '0' AND  dn.pc != '' AND  dn.pc != '0' AND dn.pcremark = '0') THEN 1 ELSE 0 END) pc,
        SUM(CASE WHEN (dn.lppcused = '0' AND  dn.lppc != '' AND  dn.lppc != '0' AND dn.lppcremark = '0') THEN 1 ELSE 0 END) lppc,
        SUM(CASE WHEN (dn.lppcused = '0' AND  dn.lppc_pas != '' AND  dn.lppc_pas != '0' AND dn.lppcremark = '0') THEN 1 ELSE 0 END) lppc_pas,
        SUM(CASE WHEN (dn.sdpused = '0' AND dn.sdp != '' AND dn.sdp != '0' AND dn.sdpremark = '0') THEN 1 ELSE 0 END) sdp,
        SUM(CASE WHEN (dn.sdpused = '0' AND dn.sdp_pas != '' AND dn.sdp_pas != '0' AND dn.sdpremark = '0') THEN 1 ELSE 0 END) sdp_pas,
        SUM(CASE WHEN (dn.sdrused = '0' AND dn.sdr != '' AND dn.sdr != '0' AND dn.sdrremark = '0') THEN 1 ELSE 0 END) sdr,
        SUM(CASE WHEN (dn.wbused = '0' AND dn.wb != '' AND dn.wb != '0' AND dn.wbremark = '0') THEN 1 ELSE 0 END) wb,
        SUM(CASE WHEN false THEN 1 ELSE 0 END) cryo
        FROM blood_group bg
        LEFT JOIN donate dn ON bg.bloodgroupid = dn.blood_group  AND (dn.bloodstatusid in (2,3,5,6) OR isnull(dn.blood_group))
        WHERE bg.bloodgroupid in ('A','B','O','AB') 
       
        GROUP BY bg.bloodgroupid 
        ORDER BY bg.bloodgroupid";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }


    function stock2()
    {
        include('../../connection.php');

        $sql = "SELECT bg.bloodgroupname,
        SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) prc,
        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc,
        SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldprc,
        SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ffp,
        SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) pc,
        SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp,
        SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp_pas,
        SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdr,
        SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) wb,
        SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc,
        SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc_pas,
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) cryo,

        SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) prc2,
        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lprc2,
        SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) ldprc2,
        SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) ffp2,
        SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) pc2,
        SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdp2,
        SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdp_pas2,
        SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdr2,
        SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) wb2,
        SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lppc2,
        SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lppc_pas2,
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) cryo2
        FROM blood_group bg
        LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup AND bs.bloodrh in ('Rh+','Rh(D)') AND bs.istypeag != 1 AND bs.active <> 0
        WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) OR bs.bloodstockstatusid = 4 ) 
        AND bg.bloodgroupid in ('A','B','O','AB')
        GROUP BY bg.bloodgroupid 
        ORDER BY bg.bloodgroupid";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }

    function stock3()
    {
        include('../../connection.php');

        $sql = "SELECT bg.bloodgroupname,
        SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) prc,
        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc,
        SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ldprc,
        SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) ffp,
        SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) pc,
        SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp,
        SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdp_pas,
        SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) sdr,
        SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) wb,
        SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc,
        SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lppc_pas,
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) cryo,

        SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) prc2,
        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lprc2,
        SUM(CASE WHEN bs.bloodtype = 'LDPRC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) ldprc2,
        SUM(CASE WHEN bs.bloodtype = 'FFP' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) ffp2,
        SUM(CASE WHEN bs.bloodtype = 'PC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) pc2,
        SUM(CASE WHEN bs.bloodtype = 'SDP' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdp2,
        SUM(CASE WHEN bs.bloodtype = 'SDP_PAS' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdp_pas2,
        SUM(CASE WHEN bs.bloodtype = 'SDR' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) sdr2,
        SUM(CASE WHEN bs.bloodtype = 'WB' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) wb2,
        SUM(CASE WHEN bs.bloodtype = 'LPPC' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lppc2,
        SUM(CASE WHEN bs.bloodtype = 'LPPC_PAS' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) lppc_pas2,
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) cryo2
        FROM blood_group bg
        LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup AND bs.bloodrh in ('Rh-') AND bs.istypeag != 1
        WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) OR bs.bloodstockstatusid = 4 ) 
        AND bg.bloodgroupid in ('A','B','O','AB')
        GROUP BY bg.bloodgroupid 
        ORDER BY bg.bloodgroupid";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }

    function stock4()
    {
        include('../../connection.php');

        $sql = "SELECT 
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) cryo,
        SUM(CASE WHEN bs.bloodtype = 'CRYO' AND bs.bloodstockstatusid = 4 THEN 1 ELSE 0 END) cryo2
        FROM bloodstock bs  
        WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) OR bs.bloodstockstatusid = 4 ) 
				AND bs.istypeag != 1";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }

    function stock5()
    {
        include('../../connection.php');

        $sql = "SELECT bg.bloodgroupname,
        SUM(CASE WHEN bs.bloodtype = 'PRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) prc,
        SUM(CASE WHEN bs.bloodtype = 'LPRC' AND bs.bloodstockstatusid = 1 THEN 1 ELSE 0 END) lprc
        
        FROM blood_group bg
        LEFT JOIN bloodstock bs ON bg.bloodgroupid = bs.bloodgroup AND  bs.bloodgroup in ('A','B','O','AB')
        WHERE (bs.bloodstockstatusid = 1 OR isnull(bs.bloodstockstatusid) ) 
				AND bg.bloodgroupid in ('A','B','O','AB')
        GROUP BY bg.bloodgroupid 
        ORDER BY FIELD(bg.bloodgroupid,'A','B','O','AB') ASC";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }

    function stock5_1()
    {
        include('../../connection.php');

        $sql = "SELECT 	* FROM bloodstock_minimum";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   $resultArray;

    }

?>