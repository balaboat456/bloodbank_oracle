<?php
    include('../../connection.php');

// if(isset($_POST['data'])){

    $id = $_POST['id'];
    $address = $_POST['address'];
    $alley = $_POST['alley'];
    $subdist = $_POST['subdist'];
    $dist = $_POST['dist'];
    $pro = $_POST['pro'];

    // $arrayresult = array();

    // ไม่เห็นมีตัดน่าจะตัดผิดมั้ง 

    $sql1 = "SELECT provinces.provinceid as pid, districts.districtid as did, subdistricts.subdistrictid as 'sid'
    FROM subdistricts
    JOIN districts ON subdistricts.districtid = districts.districtid
    JOIN provinces ON districts.provinceid = provinces.provinceid
    WHERE provinces.provinceth like '%$pro%' and districts.districtth like '%$dist%' and subdistricts.subdistrictth like '%$subdist%'";

    $query1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_row($query1);
    $proid = $row['0'];
    $distid = $row['1'];
    $subdistid = $row['2'];

    $sql = "UPDATE donor SET address = '$address', address_alley = '$alley', districtid = '$distid', subdistrictid = '$subdistid', provinceid = '$proid'
    WHERE donoridcard = '$id'";

    $query = mysqli_query($conn,$sql);




    // while($result = mysqli_fetch_array($query))
    // {
    //     array_push($arrayresult,$result);
    // }

    $data= array();
    
    $data['status'] = true;
    $data['success'] = $arrayresult;
    $data['chk'] = $_POST;
    $data['t1'] = $address;
    $data['t2'] = $proid;
    $data['t3'] = $distid;
    $data['t4'] = $subdistid;

    echo json_encode($data);
// }



?>