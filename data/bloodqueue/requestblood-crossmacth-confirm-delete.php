<?php
    include('../../connection.php');
    include('../../dateNow.php');
    include('../../data/replacestring.php');
    date_default_timezone_set('Asia/Bangkok');
    
    $requestqueueblooddate = dateNowTMD();
    $requestqueuebloodtime = date("H:i");

    $condition = '';
    $groupid = $_GET['groupid'];
    $value = $_GET['value'];
    $username = $_SESSION['username'];

    $sql = "UPDATE requestblood_crossmacth_confirm 
            SET requestbloodcrossmacthconfirmcancelstatus='1',
            requestbloodcrossmacthconfirmcanceldate = '$requestqueueblooddate',
            requestbloodcrossmacthconfirmcanceltime = '$requestqueuebloodtime',
            requestbloodcrossmacthconfirmcanceluser = '$username',
            requestbloodcrossmacthconfirmcancelremark='$value' 
            WHERE groupid = '$groupid'";
            
    
    mysqli_query($conn,$sql);


    $sql = "SELECT * FROM requestblood_crossmacth_confirm  WHERE groupid = '$groupid'"; 
    $query = mysqli_query($conn,$sql);

    $result = mysqli_fetch_array($query);
    $requestbloodcrossmacthid_group = $result["requestbloodcrossmacthid_group"];

    $requestbloodcrossmacthid_array = explode(",",$requestbloodcrossmacthid_group);
    $requestbloodid = "";

    $vrequestbloodid = "";

    $group_requestbloodid = "";

    foreach ($requestbloodcrossmacthid_array as $v) {
        if(!empty($v))
        {

            $sql = "SELECT * FROM request_blood_crossmacth  WHERE requestbloodcrossmacthid = '$v'"; 
            $query = mysqli_query($conn,$sql);

            $result = mysqli_fetch_array($query);
            $itemid = $result["requestbloodid"];

            if($result["requestbloodid"] != $vrequestbloodid)
            {
                $requestbloodid = $requestbloodid.$result["requestbloodid"].",";
                $vrequestbloodid = $result["requestbloodid"];
            }

            $group_requestbloodid = $group_requestbloodid.$result["requestbloodid"].",";
            

            $sql = "UPDATE request_blood_crossmacth
            SET 
                crossmacthstatus2id = '2',
                isreadyblood = '',
                bloodrequestunit = '',
                bloodrequestcc = '',
                readyblooddate = '',
                readybloodtime = '',
                groupid = '',
                confirmbloodrequestdate = '',
                confirmbloodrequesttime = ''
            WHERE requestbloodcrossmacthid = '$v'";
            $query = mysqli_query($conn,$sql);


            $sql = "UPDATE request_blood_crossmacth
            SET 
                crossmacthstatusid = '2'
            WHERE requestbloodid = '$itemid'";
            $query = mysqli_query($conn,$sql);

        }
    }


    


    echo json_encode(
        array(
            'status' => true,
            'gid' => $requestbloodid
        )
    );

    mysqli_close($conn);


?>