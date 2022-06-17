<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    date_default_timezone_set('Asia/Bangkok');
    $status = 1;
    mysqli_autocommit($conn, FALSE);

    $prefixname = $_POST['prefixname'];
    $genderid = $_POST['genderid'];

    $prefixname = str_replace('นางสาว','น.ส.',$prefixname);

    $sql = "SELECT * FROM prefix WHERE prefixname = '$prefixname'";
    
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query) == 0)
    {
        $sql = "
                INSERT INTO prefix
                (
                    prefixname,
                    genderid
                )
                values
                (
                    '$prefixname',
                    '$genderid'
                )
                ";
        $result = mysqli_query($conn, $sql);
        if(empty($result))
        $status = 0;
    }

    $sql = "SELECT * FROM prefix WHERE prefixname = '$prefixname'";
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}


    
    if ($status) {
        mysqli_commit($conn);
    }else
    {
        mysqli_rollback($conn);
    }

    echo json_encode(
        array(
            'status' => $status,
            'data' => $resultArray
        )
    );
    


?>