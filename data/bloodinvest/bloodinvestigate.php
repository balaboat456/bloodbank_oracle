<?php
    include('../../connection.php');

    $condition = '';
    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $fromnumber =$_GET['fromnumber'];
    $tonumber =$_GET['tonumber'];
    $bloodbagtype =$_GET['bloodbagtype'];
    $barcode =$_GET['barcode'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND DN.donation_date BETWEEN '$fromdate' AND '$todate' ";

    
    if(!empty($fromnumber) && !empty($tonumber))
    $condition = $condition." AND DN.bag_number between '$fromnumber' AND '$tonumber' ";

    if(!empty($barcode))
    $condition = $condition." AND DN.bag_number =  '$barcode' ";
    

    $sql = "SELECT DN.*,
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
    DR.blood_group AS blood_group_donor,
    DR.rh AS rh_donor,
    DR.antibody,
    DR.phenotype,
    DR.phenotypeshow,
    ST.donatestatusname,
    BT.bagtypename,
    PF.prefixname,
	ifnull(BM.bloodgroupname,'') as bloodgroupname,
    ifnull(BG.bloodgroupname,'') as bloodgroupname_cross,
		
    ifnull(RH1.rhcode,'') AS rhcode_1,
    ifnull(RH1.rhname3,'') AS rhname3_1,
    ifnull(RHRAJ.rhcode,'') AS rhcode_raj,
    ifnull(RHRAJ.rhname3,'') AS rhname3_raj,
    ifnull(RHC1.rhcode,'') AS rhcode_cross_1,
    ifnull(RHC1.rhname3,'') AS rhname_cross3_1,
    
    ifnull(RH2.rhcode,'') AS rhcode_2,
    ifnull(RH2.rhname3,'') AS rhname3_2,
    ifnull(RHC2.rhcode,'') AS rhcode_cross_2,
    ifnull(RHC2.rhname3,'') AS rhname_cross3_2,

    DATE_FORMAT(DN.dateantibodyscreeningtest,'%d/%m/%Y') AS dateantibodyscreeningtest
    
		
    
    FROM donate DN
    LEFT JOIN donor DR ON DN.donorid = DR.donorid
    LEFT JOIN donatestatus ST ON DN.donation_status = ST.donatestatusid
    LEFT JOIN bag_type BT ON DN.bag_type_id = BT.bagtypeid
    LEFT JOIN prefix PF ON DR.prefixid = PF.prefixid
	LEFT JOIN blood_group BM ON DN.blood_group = BM.bloodgroupid
    LEFT JOIN blood_group BG ON DN.blood_group_cross = BG.bloodgroupid
	LEFT JOIN rh RH1 ON DN.rh = RH1.rhid
    LEFT JOIN rh RHC1 ON DN.rh_cross = RHC1.rhid
    LEFT JOIN rh RH2 ON DN.bloodrh_sceen = RH2.rhid
    LEFT JOIN rh RHC2 ON DN.bloodrhsceen_cross = RHC2.rhid
    LEFT JOIN rh RHRAJ ON DN.rh_raj = RHRAJ.rhid
    WHERE DN.donation_status = 1  
    $condition
    ORDER BY DN.bag_number ASC";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }
    
    $dataItem = array();
    foreach ($resultArray as $item) {

        $id = $item['donateid'] ;

        //start donate count 
        $sql_count = "SELECT count(*) qtycount FROM donate WHERE donorid = '$id'";

        $query = mysqli_query($conn,$sql_count);

        $row_count = mysqli_fetch_array($query);

        $row_count_array =   array(
                'qtycount' => $row_count[0]
        );
        //end donate count 


        //start donate anti sceen 
        $sql_anti_sceen = "SELECT * FROM donate_anti_sceen WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql_anti_sceen);

        $resultArray_anti_sceen = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray_anti_sceen,$result);
        }

        $resultArray_anti_sceen_array =   array(
                'antisceen' => $resultArray_anti_sceen
        );
        //end donate anti sceen

        //start rh  array 
        $sql_rh = "SELECT * FROM donate_rh WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql_rh);

        $resultArray_rh = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray_rh,$result);
        }

        $resultArray_rh_array = array(
                'rharr' => $resultArray_rh
        );   
        //end rh    array

        //start ABO  array 
        $sql_abo = "SELECT * FROM donate_abo WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql_abo);

        $resultArray_ABO = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray_ABO,$result);
        }

        $resultArray_ABO_array = array(
                'aboarr' => $resultArray_ABO
        );  
        //end ABO  array


        //start ABO Modal  array 
        $sql_abo = "SELECT * FROM donate_abo_modal WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql_abo);

        $resultArray_ABO_Modal = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray_ABO_Modal,$result);
        }

        $resultArray_ABO_Modal_array = array(
                'abomodalarr' => $resultArray_ABO_Modal
        );  
        //end ABO Modal  array


        //start Iden  array 
        $sql_iden = "SELECT * FROM donate_anti_iden WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql_iden);

        $resultArray_Iden = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray_Iden,$result);
        }

        $resultArray_Iden_array = array(
                'antiiden' => $resultArray_Iden
        );   
        //end Iden  array

        array_push($dataItem, array_merge($item,$row_count_array,$resultArray_anti_sceen_array,$resultArray_rh_array,$resultArray_ABO_array,$resultArray_ABO_Modal_array,$resultArray_Iden_array));
    }

    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem
        )
        
    );

    mysqli_close($conn);

    function antiSceen($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM donate_anti_sceen WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

        return   array(
                'antisceen' => $resultArray
        );
     

    }

    function antiIden($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM donate_anti_iden WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'antiiden' => $resultArray
        );   

    }

    function rhArr($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM donate_rh WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'rharr' => $resultArray
        );   

    }

    function aboArr($id)
    {
        include('../../connection.php');

        $sql = "SELECT * FROM donate_abo WHERE donateid = '$id'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
  
        return   array(
                'aboarr' => $resultArray
        );   

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