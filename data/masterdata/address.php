<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    $subdistrictid =$_GET['subdistrictid'];

    $subdistrict =$_GET['subdistrict'];
    $district =$_GET['district'];
    $province =$_GET['province'];
    
    if(!empty($keyword))
    $condition = "AND concat(	ifnull(prov.provinceth,''),' ',
                    ifnull(dis.districtth,''),' ',
                    ifnull(sub.subdistrictth,''),' ',
                    ifnull(sub.zipcode,'')) 
                    like '%$keyword%'";

    if(!empty($subdistrictid))
    $condition = $condition." AND sub.subdistrictid = '$subdistrictid' ";

    if(!empty($subdistrict))
    $condition = $condition." AND sub.subdistrictth like '%$subdistrict%' ";

    if(!empty($district))
    $condition = $condition." AND dis.districtth like '%$district%' ";

    if(!empty($province))
    $condition = $condition." AND prov.provinceth like '%$province%' ";


    $sql = "SELECT sub.*,
    dis.districten,
    dis.districtth,
    prov.provinceid,
    prov.provinceen,
    prov.provinceth,
    concat(
    (case when prov.provinceid = 10000000 then 'แขวง ' else 'ตำบล ' end)
    ,ifnull(sub.subdistrictth,''),'   '
    ,(case when prov.provinceid = 10000000 then 'เขต ' else 'อำเภอ ' end)
    ,ifnull(dis.districtth,''),'   จังหวัด ',ifnull(prov.provinceth,'')) as address
    FROM subdistricts   sub
    LEFT JOIN districts dis ON sub.districtid = dis.districtid
    LEFT JOIN provinces prov ON dis.provinceid = prov.provinceid
    WHERE true $condition
    ORDER BY sub.subdistrictth
limit 50";
 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>