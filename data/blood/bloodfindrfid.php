<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];


    $sql = "SELECT DN.*,
                RH.rhname3,
                RT.receivingtypename,
                BT.bagtypename,
                DR.antibody,
                DR.phenotype
            FROM donate DN
            LEFT JOIN rh RH ON DN.rh = RH.rhid
            LEFT JOIN receiving_type RT ON DN.receivingtypeid = RT.receivingtypeid
            LEFT JOIN bag_type BT ON DN.bag_type_id = BT.bagtypeid
            LEFT JOIN donor DR ON DN.donorid = DR.donorid
            WHERE (DN.prcrfid = '$keyword' AND DN.prcrfid != '' AND DN.prcused <> 2 )
            OR (DN.lprcrfid = '$keyword' AND DN.lprcrfid != '' AND DN.lprcused <> 2)
            OR (DN.ldprcrfid = '$keyword' AND DN.ldprcrfid != '' AND DN.ldprcused <> 2)
            OR (DN.ffprfid = '$keyword' AND DN.ffprfid != '' AND DN.ffpused <> 2)
            OR (DN.pcrfid = '$keyword' AND DN.pcrfid != '' AND DN.pcused <> 2)
            OR (DN.sdprfid = '$keyword' AND DN.sdprfid != '' AND DN.sdpused <> 2)
            OR (DN.sdrrfid = '$keyword' AND DN.sdrrfid != '' AND DN.sdrused <> 2)
            OR (DN.wbrfid = '$keyword' AND DN.wbrfid != '' AND DN.wbused <> 2)
            
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