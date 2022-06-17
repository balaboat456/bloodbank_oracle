<?php
    include('../../connection.php');
    include('../pagination.php');

    $condition = '';
    $select = "DN.*,
                DR.donorcode,
                DR.donoridcard,
                DR.donorbirthday,
                DR.donorage,
                DR.donoroccupation,
                DR.donortelhome,
                DR.donormobile,
                DR.genderid,
                DR.prefixid,
                DR.fname,
                DR.lname,
                DR.address,
                DR.countryid,
                DR.provinceid,
                DR.districtid,
                DR.subdistrictid,
                DR.zipcode,
                DR.souvenirid,
                DR.blood_group,
                DR.rh,
                DT.donation_type_name,
                CONCAT(IFNULL(SF.name,''),' ',IFNULL(SF.surname,'')) AS inspectorid_fullnull,
                
                ST.donatestatusname ";
    $selectcount = " count(*) countpage ";
    
    $activePage = $_GET['activepage'];
    $numRows = $_GET['numrows'];

    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $bloodstocktype = $_GET['bloodstocktype'];
    $donatestatus = $_GET['donatestatus'];
    $bloodgroup = $_GET['bloodgroup'];
    $keyword = $_GET['keyword'];
    $barcode = $_GET['barcode'];
    $donation_type_id = $_GET['donation_type_id'];
    $inspectorid = $_GET['inspectorid'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND DN.donation_date BETWEEN '$fromdate' AND '$todate' ";
   

    if(!empty($bloodgroup) && $bloodgroup != 'null' )
    $condition = $condition." AND DN.blood_group = '$bloodgroup' ";

    if(!empty($donatestatus) && $donatestatus != 'null')
    $condition = $condition." AND DN.donation_status = '$donatestatus' ";

    if(!empty($donation_type_id) && $donation_type_id != 'null')
    $condition = $condition." AND DN.donation_type_id = '$donation_type_id' ";

    if(!empty($inspectorid) && $inspectorid != 'null')
    $condition = $condition." AND DN.inspectorid = '$inspectorid' ";

    if(!empty($barcode))
    $condition = $condition." AND DN.bag_number = '$barcode' ";

    if(!empty($keyword))
    $condition = $condition."AND CONCAT( ifnull(DN.donatecode,''),' ',
                            ifnull(DR.donoridcard,''),' ',
                            ifnull(DR.donorcode,''),' ',
                            ifnull(DR.fname,''),' ',
                            ifnull(DR.lname,''),' ',
                            ifnull(DN.bag_number,'')) LIKE '%$keyword%' ";

    // $sqlcount = condition($selectcount,$condition);
    
    // $querycount = mysqli_query($conn,$sqlcount);


    // $resultcount = mysqli_fetch_array($querycount);
    // $pagination = paginationCompress(intval($resultcount['countpage']),$activePage,$numRows);

    // $start = $pagination['start'];
    // $numrow = $pagination['num_rows'];
    
    $sql = condition($select,$condition);
    // $sql = $sql." LIMIT $start,$numrow ";


    $query = mysqli_query($conn,$sql);
    
    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }

    $dataItem = array();
    foreach ($resultArray as $item) {

        $id = $item['donorid'];

        $sql = "SELECT count(*) qtycount FROM donate WHERE donorid = '$id'";

        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($query);

        $donateCountArray = array(
                'qtycount' => $row[0]
        );

        array_push($dataItem, array_merge($item,$donateCountArray));
    }
    
    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem,
            'total' => count($dataItem)
            // 'pagination' => $pagination
        )
        
    );

    mysqli_close($conn);

    function condition($select,$condition)
    {
        return "SELECT $select
    FROM donate DN
    LEFT JOIN donor DR ON DN.donorid = DR.donorid
    LEFT JOIN donatestatus ST ON DN.donation_status = ST.donatestatusid
    LEFT JOIN donation_type DT ON DN.donation_type_id = DT.donation_type_id
    LEFT JOIN staff SF ON DN.inspectorid = SF.id
    WHERE true $condition
    ORDER BY DN.donation_date  DESC
    LIMIT 2500";
    }

    function donateCount($id)
    {
        include('../../connection.php');

        $sql = "SELECT count(*) qtycount FROM donate WHERE donorid = '$id'";

        $query = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($query);
       
         
        return   array(
                'qtycount' => $row[0]
        );
     

    }

?>