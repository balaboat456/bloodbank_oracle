<?php
    include('../../connection.php');
    include('../replacestring.php');

    $condition = '';

  

    $resultArrayObj = array();  

    $sql="SELECT COUNT(*) AS total FROM donate WHERE donation_date = DATE_ADD(CURDATE(), INTERVAL 543 YEAR) ";
    $result=mysqli_query($con,$sql);
    $data1=mysqli_fetch_assoc($result);

    $sql="select count(*) as total FROM bloodstock WHERE bloodstockstatusid in (1) AND active <> 0  ";
    $result=mysqli_query($con,$sql);
    $data2=mysqli_fetch_assoc($result);

    $sql="SELECT COUNT(* ) AS total
            FROM request_blood_crossmacth CM
            LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
            WHERE RB.requestblooddate = DATE_ADD(CURDATE(), INTERVAL 543 YEAR) ";
    $result=mysqli_query($con,$sql);
    $data4=mysqli_fetch_assoc($result);
    
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArrayObj,
            'donatedatetotal' => $data1['total'],
            'bagnumbertotal' => $data2['total'],
            'crossmacthdatetotal' => $data4['total']
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