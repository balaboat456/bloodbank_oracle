<?php
    include('../../connection.php');
    include('../pagination.php');
    $seq = 0;
    $idmain = '';
    $condition = '';
    $select = " IM.*,
    HO.hospitalname,
    RT.receivingtypename,
    BT.bagtypename,
    RH.rhname3,
    concat(ifnull(SF.name,''),' ',ifnull(SF.surname,'')) as fullname,
    DBT.donatebloodtypename,
    ST.bloodstockmaindate,
    ST.bloodstockmaintime,
    ST.pickupofficer,
    ST.donatebloodtypeid AS donatebloodtypeid2,
    ST.bloodstockmainamount,
    BSRM.bloodstockremarkedittext,
    URE.fullname AS bloodstockeditfullname,
    URC.fullname AS bloodstockcreatefullname";
    $selectcount = " count(*) countpage ";
    
    $activePage = $_GET['activepage'];
    $numRows = $_GET['numrows'];

    $fromdate = $_GET['fromdate'];
    $todate = $_GET['todate'];
    $bloodstocktypecross = $_GET['bloodstocktypecross'];
    $receivingtypeid2 = $_GET['receivingtypeid2'];

    $bag_number = $_GET['bag_number'];
    $rfidcode = $_GET['rfidcode'];

    $hn = $_GET['hn'];

    if(!empty($fromdate) && !empty($todate))
    $condition = $condition." AND ST.bloodstockmaindate BETWEEN '$fromdate' AND '$todate' ";

    if (!empty($hn))
    $condition = $condition . " AND IM.patienthn LIKE '$hn' ";

    if(!empty($bloodstocktypecross) && $bloodstocktypecross != 'null')
    $condition = $condition." AND IM.bloodtype LIKE '$bloodstocktypecross' ";
   
    if(!empty($receivingtypeid2) && $receivingtypeid2 != 'null')
    $condition = $condition." AND RT.receivingtypeid LIKE '$receivingtypeid2' ";

    if(!empty($bag_number))
    $condition = $condition." AND IM.bag_number LIKE '%$bag_number%' ";

    if(!empty($rfidcode))
    $condition = $condition." AND IM.bloodstockrfid LIKE '%$rfidcode%' ";

    
    $sql = condition($select,$condition);
    $sql = $sql." LIMIT 5000 ";
    $query = mysqli_query($conn,$sql);
    
    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
    }


    $dataItem = array();
    foreach ($resultArray as $item) {

        $bloodstockmainid = $item['bloodstockmainid'];

        $sql = "SELECT IM.*,RH.rhname3,HO.hospitalname,RT.receivingtypename,BT.bagtypename
        FROM bloodstock IM
        LEFT JOIN hospital HO ON IM.hospitalid = HO.hospitalid
        LEFT JOIN receiving_type RT ON IM.receivingtypeid = RT.receivingtypeid
        LEFT JOIN bag_type BT ON IM.bagtypeid = BT.bagtypeid
        LEFT JOIN rh RH ON IM.bloodrh = RH.rhid
        WHERE IM.bloodstockmainid = '$bloodstockmainid'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
         
        $itemArray =  array(
                'item' => $resultArray
        );

        array_push($dataItem, array_merge($item,$itemArray));
    }

    $seq = 1;
    $idmain = '';
    $i = 0;
    for ($x = 0; $x < count($dataItem); $x++) {

        if($dataItem[$x]['bloodstockmainid'] != $idmain)
        {
            $dataItem[$i]['bloodstockmainamount'] = $seq;
            $i = $x;
            $seq = 1;
        }else
        {
            $seq = $seq+1;
        }
        $dataItem[$x]['seq'] = $seq;
        $idmain = $dataItem[$x]['bloodstockmainid'];

        if($x == count($dataItem)-1)
        {
            $dataItem[$i]['bloodstockmainamount'] = $seq;
            $i = $x;
        }
    }




    
    echo json_encode(
        array(
            'status' => true,
            'data' => $dataItem,
            'pagination' => $pagination
        )
        
    );

    mysqli_close($conn);

    function condition($select,$condition)
    {
        return "SELECT $select
        FROM bloodstock IM
        LEFT JOIN bloodstock_main ST ON IM.bloodstockmainid = ST.bloodstockmainid
        LEFT JOIN staff SF ON ST.pickupofficer = SF.id
        lEFT JOIN donate_blood_type DBT ON ST.donatebloodtypeid   = DBT.donatebloodtypeid
        LEFT JOIN hospital HO ON IM.hospitalid = HO.hospitalid
        LEFT JOIN receiving_type RT ON IM.receivingtypeid = RT.receivingtypeid
        LEFT JOIN rh RH ON IM.bloodrh = RH.rhid
        LEFT JOIN bag_type BT ON IM.bagtypeid = BT.bagtypeid
        LEFT JOIN bloodstock_remark_edit BSRM ON IM.bloodstockremarkeditid = BSRM.bloodstockremarkeditid
        LEFT JOIN users URE ON IM.bloodstockeditusername = URE.username
        LEFT JOIN users URC ON ST.bloodstockmaincreate = URC.username
        WHERE true 
        $condition
        ORDER BY ST.bloodstockmainid DESC";
    }

    function getItem($bloodstockmainid)
    {
        
        include('../../connection.php');

        $sql = "SELECT IM.*,RH.rhname3,HO.hospitalname,RT.receivingtypename,BT.bagtypename
        FROM bloodstock IM
        LEFT JOIN hospital HO ON IM.hospitalid = HO.hospitalid
        LEFT JOIN receiving_type RT ON IM.receivingtypeid = RT.receivingtypeid
        LEFT JOIN bag_type BT ON IM.bagtypeid = BT.bagtypeid
        LEFT JOIN rh RH ON IM.bloodrh = RH.rhid
        WHERE IM.bloodstockmainid = '$bloodstockmainid'";

        $query = mysqli_query($conn,$sql);

        $resultArray = array();
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }

       
         
        return   array(
                'item' => $resultArray
        );
     

    }

    
?>