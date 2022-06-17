<?php
    include('../../connection.php');
    include('../replacestring.php');

    $condition = '';

    $curl = curl_init();

    // echo $gate_rfid_config;

    curl_setopt_array($curl, array(
    CURLOPT_URL => $gate_rfid_config,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
    ),
    ));

    $resultPost = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($resultPost);
    


    $resultArray = array();
    $TagID = "";
    foreach ($res as $inx => $v) {
        if(!empty($v->TagID))
        $TagID = $TagID.json_encode($v->TagID).",";
    }
    $TagID =  laststring($TagID) ; 

    $sql = "SELECT * FROM bloodstock WHERE  bloodstockrfid in ($TagID) AND active <> 0 ";

    $query = mysqli_query($conn,$sql);

    while($result = mysqli_fetch_array($query))
    {
        $result["gateid"] = "";
        foreach ($res as $inx => $v) {
           
            if($v->TagID == $result["bloodstockrfid"])
            {
                $result["gateid"] = $v->GateID ;
            }
        }
        array_push($resultArray,$result);
    }


    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
            
        )
    );

    mysqli_close($conn);


    function _group_by($array) {
        $return = array();
        foreach($array as $val) {
            if(!in_array($val->GateID,$return))
            array_push($return,$val->GateID);
        }
        return $return;
    }
?>