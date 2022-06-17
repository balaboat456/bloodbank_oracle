<?php
    include('../../connection.php');

    $condition = '';
    $keyword =$_GET['keyword'];

    /*
    if(!empty($keyword))
    $condition = "AND  CONCAT(IFNULL(diagnosiscode,''),' ',IFNULL(diagnosisname,''),' ',REPLACE(REPLACE(IFNULL(diagnosisname,''),',',''),'`',''),' ',IFNULL(diagnosisname2,'')) LIKE '%$keyword%' ";

    $sql = "SELECT * FROM diagnosis WHERE true $condition  ORDER BY diagnosisid ASC LIMIT 20";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}

    */

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.rajavithi.go.th/PRODUCTION/API/Master_Data/icd10',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 1000,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'utoken=bloodbank&ptoken=945adc28c78ec8d6ff1c2c27fba3c2cd&prj=VUhKcU1UZz0%3D&icd10help='.$keyword,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $responseArray = json_decode($response);
    $jsondata = $responseArray->jsondata;

    $resultArray = array();
    foreach($jsondata as $key=>$value) {

        $value->diagnosisid = $value->icd10;
        $value->diagnosiscode = $value->icd10;
        $value->diagnosisname = $value->name;
        $value->diagnosisname2 = $value->thainame;
        // array_push($resultArray,$result);

    }

    if(count($jsondata) == 0 )
    {

        if(!empty($keyword))
        $condition = "AND  CONCAT(IFNULL(diagnosiscode,''),' ',IFNULL(diagnosisname,''),' ',REPLACE(REPLACE(IFNULL(diagnosisname,''),',',''),'`',''),' ',IFNULL(diagnosisname2,'')) LIKE '%$keyword%' ";

        $sql = "SELECT * FROM diagnosis WHERE true $condition  ORDER BY diagnosisid ASC LIMIT 20";
        
        $query = mysqli_query($conn,$sql);

        while($result = mysqli_fetch_array($query))
        {
            array_push($resultArray,$result);

        }
        $jsondata = $resultArray;
    }else if(count($jsondata) == 1)
    {
        if($jsondata[0]->icd10 != $keyword)
        {
            if(!empty($keyword))
            $condition = "AND  CONCAT(IFNULL(diagnosiscode,''),' ',IFNULL(diagnosisname,''),' ',REPLACE(REPLACE(IFNULL(diagnosisname,''),',',''),'`',''),' ',IFNULL(diagnosisname2,'')) LIKE '%$keyword%' ";
    
            $sql = "SELECT * FROM diagnosis WHERE true $condition  ORDER BY diagnosisid ASC LIMIT 20";
            
            $query = mysqli_query($conn,$sql);
    
            while($result = mysqli_fetch_array($query))
            {
                array_push($resultArray,$result);
    
            }
            $jsondata = $resultArray;
        }
    }

    
    echo json_encode(
        array(
            'status' => true,
            'data' => $jsondata
        )
    );

    mysqli_close($conn);
?>