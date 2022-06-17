<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    $bag_number = $_GET['bag_number'];


    $sql = "SELECT DN.*,
                RH.*,
                RT.receivingtypename,
                DR.antibody,
                DR.phenotype,
                DR.donorcode,
                BT.bagtypename,
                BT.PRC AS IS_PRC,
                BT.LPRC AS IS_LPRC,
                BT.LDPRC AS IS_LDPRC,
                BT.FFP AS IS_FFP,
                BT.PC AS IS_PC,
                BT.SDP AS IS_SDP,
                BT.SDR AS IS_SDR,
                BT.WB AS IS_WB,
                BT.LPPC AS IS_LPPC,
                BT.LPPC_PAS AS IS_LPPC_PAS,
                BT.SDP_PAS AS IS_SDP_PAS,
                BT.CRP AS IS_CRP,
                BT.CRYO AS IS_CRYO
            FROM donate DN
            LEFT JOIN rh RH ON DN.rh = RH.rhid
            LEFT JOIN receiving_type RT ON DN.receivingtypeid = RT.receivingtypeid
            LEFT JOIN bag_type BT ON DN.bag_type_id = BT.bagtypeid
            LEFT JOIN donor DR ON DN.donorid = DR.donorid
            WHERE  DN.bag_number = '$bag_number'
            ";

 
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
    if (mysqli_num_rows($query) > 0) {
        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);
        }
    }

    
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray
        )
        
    );

    mysqli_close($conn);
?>