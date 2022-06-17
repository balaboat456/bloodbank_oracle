<?php
    include('../../connection.php');

    $parm = $_POST['parm'];
    $json_item = json_decode($parm);

    $resultArray = array();
    foreach ($json_item as $item) {

        $requestbloodid = $item->requestbloodid;
        $bloodtype = $item->cm_bloodtype;
        $bloodgroup = $item->cm_bloodgroup;
        $bloodrequestunit = $item->bloodrequestunit;
        $isreadyblood = $item->isreadyblood;

        error_log("bloodrequestunit === ".$bloodrequestunit);
        
        if($isreadyblood)
		{

            $sql = "SELECT CM.* ,
                            ST.crossmacthstatusname,
                            RB.confirmbloodgroup,
                            RB.confirmrhid,
                            (CASE WHEN CM.bloodtype != 'CRYO' AND (RB.confirmbloodgroup != CM.bloodgroupid OR RB.confirmrhid != CM.rhid) THEN 'เลือดต่างหมู่' ELSE RS.crossmacthresultname END ) AS crossmacthresultname
                    FROM request_blood_crossmacth CM
                    LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
                    LEFT JOIN crossmacth_result RS ON CM.crossmacthresultid = RS.crossmacthresultid
                    LEFT JOIN crossmacth_status ST ON CM.crossmacthstatusid = ST.crossmacthstatusid
                    WHERE (CM.crossmacthstatusid = 3 OR CM.crossmacthresultid = 3)
                    AND CM.crossmacthstatusid NOT IN (4,5,6,7,8,9,10,11)
                    AND CM.requestbloodid = '$requestbloodid' 
                    AND CM.bloodtype = '$bloodtype' 
                    AND CM.bloodgroupid = '$bloodgroup' 
                    ORDER BY CM.crossmacthstatusid 
                    LIMIT $bloodrequestunit";

            $query = mysqli_query($conn,$sql);

            error_log($sql);

            while($result = mysqli_fetch_array($query))
            {
                array_push($resultArray,$result);
            }

        }

        // $im = json_decode($item);
        
        // $bloodstockid =   $im[0]->bloodstockid; 
        // $ck =   $im[0]->ck; 
		// if($ck)
		// {
		// 	$sql = "UPDATE  bloodstock SET 
        //             bloodtype = 'LPRC',
		// 			bloodstockstatusid = '1'
		// 			WHERE bloodstockid = '$bloodstockid'
		// 		";

			
		// 	$result = mysqli_query($conn, $sql);
		// 	if(empty($result))
        //     $status = false;
            
		// }


    }
    
    // $requestbloodid =$_GET['requestbloodid'];
    // $bloodtype =$_GET['bloodtype'];
    // $bloodgroup =$_GET['bloodgroup'];


    
    


    // $sql = "SELECT * FROM request_blood_crossmacth WHERE crossmacthstatusid = 2 AND crossmacthresultid in (2,3) AND requestbloodid in ($requestbloodid) AND bloodtype in ($bloodtype) AND bloodgroupid IN ($bloodgroup)";


    // $query = mysqli_query($conn,$sql);

	// while($result = mysqli_fetch_array($query))
	// {
	// 	array_push($resultArray,$result);
	// }




    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>