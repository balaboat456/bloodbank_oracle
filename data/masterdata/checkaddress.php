<?php
include('../../connection.php');


// $citizen = (!empty($_GET['citizenid']))?$_GET['citizenid']:"";





if(isset($_POST['data'])){


    
    $citizen = $_POST['data'];
    $arrayresult = array();

    if(!empty($citizen))
    {
        $sql = "SELECT donor.address, donor.address_alley, subdistricts.subdistrictth, districts.districtth, provinces.provinceth, donor.provinceid, donor.districtid, donor.subdistrictid,
        donor.donoridcard FROM donor 
        JOIN provinces ON donor.provinceid = provinces.provinceid
        JOIN districts ON donor.districtid = districts.districtid
        JOIN subdistricts ON donor.subdistrictid = subdistricts.subdistrictid
        where donor.donoridcard = '$citizen'";
        
        $query = mysqli_query($conn,$sql);

        while($result = mysqli_fetch_array($query))
        {
            array_push($arrayresult,$result);
        }
    }
    
    
    $data= array();
    
    $data['status'] = true;
    $data['olddata'] = $arrayresult;
    $data['chk'] = $citizen;
    echo json_encode($data);
}
    // mysqli_close($conn);
// }else{
//     echo json_encode(
//         array(
//             'status' => false,
//             'olddata' => "eiei";
//         )
        
//     )
// }

?>