<?php
    include('../connection.php');

    $rfid = $_GET['rfidcode'];
    $getallheaders = getallheaders();
    $API_KEY = $getallheaders['api_key'];

    header("Content-type: application/json; charset=utf-8");
    
    /*
    if($API_KEY != "P@ssGGIuwhToKHFTRUJFFE")
    {
        echo json_encode(
            array(
                'status' => false,
                'errormessage' => "api_key ไม่ถูกต้อง"
            )
            
        );
        return false;
    }else 
    */
    if(empty($rfid))
    {
        echo json_encode(
            array(
                'status' => false,
                'errormessage' => "ไม่ระบุ parameter"
            )
            
        );
        return false;
    }
    
    $rfid_array =  explode(',',$rfid);


    $rfidcode = json_encode($rfid_array);
    $rfidcode = str_replace("[","",$rfidcode);
    $rfidcode = str_replace("]","",$rfidcode);

    $sql = "SELECT 	IFNULL(BS.bloodstockrfid,'') AS  bloodstockrfid,
                    IFNULL(BS.bag_number,'') AS bagnumber,
                    IFNULL(BS.sub,'') AS sub,
                    IFNULL(BS.rubberbandnumber,'') AS rubberbandnumber,
                    IFNULL(BS.bloodtype,'') AS bloodtype,
                    IFNULL(BT.bloodstocktypename2,'') AS bloodstocktypename,
                    IFNULL(BS.bloodgroup,'') AS bloodgroup,
                    IFNULL(BS.bloodrh,'') AS bloodrh,
                    IFNULL(BS.bloodstart,'') AS bloodstart,
                    IFNULL(BS.bloodexp,'') AS bloodexp,
                    IFNULL(BS.antibody,'') AS antibody,
                    IFNULL(BS.phenotype,'') AS phenotype,
                    IFNULL(RB.hn,'') AS patienthn,
                    IFNULL(PT.patientfullname,'') AS patientfullname,
                    IFNULL(BST.bloodstockstatusname,'') AS bloodstockstatusname
                FROM bloodstock BS
                LEFT JOIN receiving_type RT ON BS.receivingtypeid = RT.receivingtypeid
                LEFT JOIN hospital HOS ON BS.hospitalid = HOS.hospitalid
                LEFT JOIN bloodstock_type BT ON BS.bloodtype = BT.bloodstocktypeid
                LEFT JOIN bloodstock_status BST ON BS.bloodstockstatusid = BST.bloodstockstatusid
                LEFT JOIN bloodstock_main BSM ON BS.bloodstockmainid = BSM.bloodstockmainid
                                LEFT JOIN request_blood_crossmacth CM ON BS.bloodstockid = CM.bloodstockid
                                LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
                                LEFT JOIN patient PT ON RB.hn = PT.patienthn
                WHERE BS.bloodstockrfid in ($rfidcode)
                ORDER BY BS.bloodstockid DESC";

    

    error_log($sql);

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
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>