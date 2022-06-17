<?php
    include('../../connection.php');

    $condition = '';
    
    $fromdate =$_GET['fromdate'];
    $todate =$_GET['todate'];

    $donation_qty =$_GET['donation_qty'];
    $souvenirid =$_GET['souvenirid'];

    // if($souvenirid == 1){
    // $condition = $condition . " AND DT.souvenirid = '$souvenirid' ";
    // } else if ($souvenirid == 2) {
    // $condition = $condition . " AND DT.souvenirid = '$souvenirid' ";
    // }

    // if(!empty($fromdate) && !empty($todate))
    // $condition = $condition." AND DT.donation_date BETWEEN '$fromdate' AND '$todate' ";

    if(!empty($donation_qty) )
    $condition = $condition." AND DN.souvenirnum = '$donation_qty' ";


    $sql = "SELECT *
    FROM
    (
    SELECT 
DR.donorcode,
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
	CASE WHEN DN.getneedle = 1 THEN 'ขอรับเข็ม'
		WHEN DN.getneedle = 2 THEN 'รอรับเข็ม'
		WHEN DN.getneedle = 3 THEN 'รับเข็มแล้ว'
	ELSE '' END AS getcard ,
	DATE_FORMAT(DN.getneedledate,'%d/%m/%Y') AS getcarddate ,
	DN.staffcardid,
	IFNULL(STF.`name`,'') AS staffname 
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN staff STF ON STF.id = DN.staffneedleid
WHERE DN.getneedledate BETWEEN '$fromdate' AND '$todate'
AND DN.getneedle = 3
$condition
ORDER BY DN.placeid, DN.unitnameid

UNION

SELECT 
DR.donorcode,
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
	CASE WHEN DN.getneedle = 1 THEN 'ขอรับเข็ม'
		WHEN DN.getneedle = 2 THEN 'รอรับเข็ม'
		WHEN DN.getneedle = 3 THEN 'รับเข็มแล้ว'
	ELSE '' END AS getcard ,
	DATE_FORMAT(DN.getneedledate,'%d/%m/%Y') AS getcarddate ,
	DN.staffcardid,
	IFNULL(STF.`name`,'') AS staffname 
FROM donate DN
LEFT JOIN donor DR ON DN.donorid = DR.donorid
LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
LEFT JOIN donat_mobile_unit UN ON DN.unitnameid = UN.id
LEFT JOIN staff STF ON STF.id = DN.staffneedleid
WHERE DN.getneedledate BETWEEN '$fromdate' AND '$todate'
AND DN.receiveneedle != 0
$condition
ORDER BY DN.placeid, DN.unitnameid
)
GROUP BY M.donateid
";
                    
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    array_push($Array_id1, $result['donateid']);
    }
    

    echo json_encode(
        array(
            'status' => true,
        'resultArray' => $resultArray,
            'total' => count($resultArray),
        'Array_id1' => $Array_id1,
        )
        
    );

    mysqli_close($conn);
?>