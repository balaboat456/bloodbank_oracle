<?php
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    session_start();
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $date = dateNowYMDHM();
    $formbloodout = json_decode($_POST['formbloodout']);

    $outbloodborrowid = $_POST['outbloodborrowid'];
    
    $outbloodborrowitemid = $_POST['outbloodborrowitemid'];
    $outbloodstockpaytypeid = $_POST['outbloodstockpaytypeid'];
    $outhospitalid = $_POST['outhospitalid'];
    $bloodstockpaymainremark = $_POST['bloodstockpaymainremark'];

    $hn_pay_out = $_POST['hn_pay_out'];
    $patient_pay_out = $_POST['patient_pay_out'];

    $patient_pay_date = dmyToymd($_POST['patient_pay_date']);
    $patient_pay_time = $_POST['patient_pay_time'];
    

    $outbloodgroup = $_POST['outbloodgroup'];

    $bloodbrokenid = $_POST['bloodbrokenid'];

    $username = $_SESSION['username'];

    $running_main = getRunningYM('PAYM');
    $runn_main = $running_main['runn'];
    $code_main = $running_main['code'];

    $stateoutbloodborrowitemid = false;
  
    foreach ($formbloodout as $item) {
        $im = json_decode($item);
        $ischeckout = $im[0]->ischeckout; 
        $bloodstockid = $im[0]->bloodstockid; 
        $bloodstockpaytypeid = $im[0]->bloodstockpaytypeid; 
        $bloodtype = $im[0]->bloodtype; 
        $bloodgroup = $im[0]->bloodgroup;
        $rhid = $im[0]->bloodrh;
        $bag_number = $im[0]->bag_number;
        $sub = $im[0]->sub;
      
        if($ischeckout)
        {

            error_log("====*********=====");

            $condition = "";
            if($outbloodstockpaytypeid == 2)
            $condition = "bloodtype = 'LPRC-O', ";

            $sql = "
            UPDATE bloodstock SET
            $condition
            bloodstockstatusid = '2',
            bloodstockpaytypeid = '$bloodstockpaytypeid',
            userpay = '$username',
            bloodstockpaydatetime = '$date'
            WHERE bloodstockid = '$bloodstockid'
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $sql = "UPDATE request_blood_crossmacth SET
            crossmacthstatusid = '5',
            crossmacthstatus2id = '5'
            WHERE bag_number = '$bag_number'
            AND sub = '$sub'
            AND bloodtype = '$bloodtype'
            AND crossmacthstatusid IN (1,2,3)
            ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;

            $running = getRunningYM('PAY');
            $runn = $running['runn'];
            $code = $running['code'];


            $sql = "INSERT INTO bloodstock_pay 
                    (
                        bloodstockpayid,
                        bloodstockpaycode,
                        bloodstockpaymainid,
                        bloodstockpaytypeid,
                        bloodstockpaydatetime,
                        bloodtype,
                        bloodgroup,
                        rhid,
                        bag_number,
                        sub,
                        bloodstockid
                    )
                    VALUE
                    (
                        '$runn',
                        '$code',
                        '$runn_main',
                        '$bloodstockpaytypeid',
                        '$date',
                        '$bloodtype',
                        '$bloodgroup',
                        '$rhid',
                        '$bag_number',
                        '$sub',
                        '$bloodstockid'
                    )
                    ";

            $result = mysqli_query($conn, $sql);
            if(empty($result))
            $status = false;


            $a_qty = 0;
            $b_qty = 0;
            $o_qty = 0;
            $ab_qty = 0;
            $cryo_qty = 0;


            if($outbloodgroup == 'A')
            {
                $a_qty++;
            }else if($outbloodgroup == 'B')
            {
                $b_qty++;
            }else if($outbloodgroup == 'O')
            {
                $o_qty++;
            }else if($outbloodgroup == 'AB')
            {
                $ab_qty++;
            }else if($outbloodgroup == "CRYO")
            {
                $cryo_qty++;
            }


            if(!empty($outbloodborrowitemid) )
            {

                $sql = "UPDATE blood_borrow_item SET
                    a_qty_refund = `a_qty_refund`+$a_qty,
                    b_qty_refund = `b_qty_refund`+$b_qty,
                    o_qty_refund = `o_qty_refund`+$o_qty,
                    ab_qty_refund = `ab_qty_refund`+$ab_qty,
                    cryo_qty_refund = `cryo_qty_refund`+$cryo_qty
                    WHERE bloodborrowitemid = '$outbloodborrowitemid'

                ";

                $result = mysqli_query($conn, $sql);

                if(empty($result))
                $status = false;


                $stateoutbloodborrowitemid = true;

            }


        }
        
            
        }

        $sql = "INSERT INTO bloodstock_pay_main
                (
                    bloodstockpaymainid,
                    bloodstockpaymaincode,
                    bloodstockpaymaindate,
                    bloodborrowid,
                    bloodstockpaymainuser,
                    bloodstockpaytypeid,
                    hospitalid,
                    bloodstockpaymainremark,
                    hn_pay_out,
                    patient_pay_out,
                    bloodbrokenid,
                    patient_pay_date,
                    patient_pay_time
                )
                VALUE
                (
                    '$runn_main',
                    '$code_main',
                    '$date',
                    '$outbloodborrowid',
                    '$username',
                    '$outbloodstockpaytypeid',
                    '$outhospitalid',
                    '$bloodstockpaymainremark',
                    '$hn_pay_out',
                    '$patient_pay_out',
                    '$bloodbrokenid',
                    '$patient_pay_date',
                    '$patient_pay_time'
                )
                ";

                $result = mysqli_query($conn, $sql);
                if(empty($result))
                $status = false;
        


if ($status) {
    mysqli_commit($conn);
}else
{
    mysqli_rollback($conn);
}

echo json_encode(
    array(
        'status' => $status,
        'id' => $runn_main,
        '$formbloodout' => $formbloodout 
    )
);
    

    // end การบริจาค


?>