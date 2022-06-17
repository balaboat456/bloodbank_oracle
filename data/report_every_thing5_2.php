<?php

    include('../connection.php');

    $condition = '';
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];
    $placeid =$_GET['placeid'];
    $unitnameid =$_GET['unitnameid'];
    $activityid =$_GET['activityid'];

    if($placeid == ''){
        $place = '';
    }else if($placeid == 1)
    {
        $activityname = '';
        $unitname = '';
        $place = "AND DN.placeid LIKE '$placeid'";
    }
    else if($placeid == 2)
    {
        $activityname = '';
        $unitname = "AND DN.unitnameid LIKE '$unitnameid'";
        $place = "AND DN.placeid LIKE '$placeid'";
    }
    else if($placeid == 3)
    {
        $activityname = "AND DN.activityid LIKE '$activityid'";
        $unitname = '';
        $place = "AND DN.placeid LIKE '$placeid'";
    }
   
    ///////////////////////////////////////////////////////////////
    // if($unitnameid == ''){
    //     $unitname = '';
    // }
    // else{
    //     $unitname = "AND DN.unitnameid LIKE '$unitnameid'";
    // }
    // if($activityid == ''){
    //     $activityname = '';
    // }
    // else{
    //     $activityname = "AND DN.activityid LIKE '$activityid'";
    // }

    $sql = "SELECT DR.donorcode,
    DN.bag_number,CONCAT(IFNULL(PF.prefixname,''),IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) fullname,
    DN.blood_group,
    DATE_FORMAT(DR.donorbirthday,'%d/%m/%Y') as donorbirthday,
		CASE WHEN 
    CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,''),' ',DR.zipcode) = '' 
		OR  CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,''),' ',DR.zipcode) IS NULL
		THEN
		   CONCAT(IFNULL(DR.address_current,''),' ',IFNULL(DR.address2_current,''),' ',DR.zipcode_current)
		ELSE 
			 CONCAT(IFNULL(DR.address,''),' ',IFNULL(DR.address2,''),' ',DR.zipcode)
		END AS address,
    UN.dmu_name,
    DN.placeid,
    DN.donateid,
		CASE WHEN DN.getcard = 1 THEN 'ขอรับบัตร'
		 WHEN DN.getcard = 2 THEN 'รอรับบัตร'
		 WHEN DN.getcard = 3 THEN 'รับบัตรแล้ว'
		ELSE '' END AS getcard ,
		DATE_FORMAT(DN.getcarddate,'%d/%m/%Y') AS getcarddate ,
		DN.staffcardid,
		IFNULL(STF.`name`,'') AS staffname 
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN staff STF ON STF.id = DN.staffcardid
WHERE DN.getcarddate BETWEEN '$fromdate' AND '$todate'
AND DN.getcard = 2
-- $place
-- $unitname
-- $activityname
ORDER BY DN.placeid, DN.unitnameid
";
   

    $query = mysqli_query($conn,$sql);

    $number = 0;
    $data = "";
    $text = '"left_table"';

$resultArray = array();

$Array_id1 = array();
	while($row = mysqli_fetch_array($query))
	{
        // $number += 1;
		// $data.= "<tr>";
        // $data .= '<td><input type="checkbox" id="'.$row['donateid']. '" value="'. $row['donateid'].'"></td>';
        // $data.= "<td>" . $number . "</td>";
        // $data.= "<td>" . $row['donorcode'] . "</td>";
        // $data.= "<td class=".$text.">" . $row['fullname'] . "</td>";
        // $data.= "<td>" . $row['blood_group'] . "</td>";
        // $data.= "<td>" . $row['donorbirthday'] . "</td>";
        // $data.= "<td class=".$text.">" . $row['address'] . "</td>";
        // // $data.= "<td></td>";
        // $data.= "</tr>";

    array_push($resultArray, $row);
    array_push($Array_id1, $row['donateid']);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $data,
        'resultArray' => $resultArray,
        'Array_id1' => $Array_id1,
            'sql' =>$sql,
        )
        
    );

    // echo $data;
    mysqli_close($conn);
