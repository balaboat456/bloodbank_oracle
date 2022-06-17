<?php

date_default_timezone_set('Asia/Bangkok');
include('../connection.php');
include('../data/dateFormat.php');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.rajavithi.go.th/PRODUCTION/API/Master_Data/icd10',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'utoken=bloodbank&ptoken=945adc28c78ec8d6ff1c2c27fba3c2cd&prj=VUhKcU1UZz0%3D',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$status = true;
$response = curl_exec($curl);
curl_close($curl);


$responseArray = json_decode($response);

if($responseArray->result)
{

    foreach ($responseArray->jsondata as $item) {
        
        $im = (array)$item;

        $masterdata = $im["Master Data"] ;

        $icd10 = $masterdata->icd10;
        $name = $masterdata->name;

        $sql = "SELECT 	* FROM diagnosis WHERE diagnosisid='$icd10' ";
        $query = mysqli_query($conn,$sql);

        $query_row = mysqli_num_rows($query);

        if($query_row == 0)
        {
            $sql = 'INSERT INTO diagnosis 
                        (
                            diagnosiscode,
                            diagnosisname
                        )
                        VALUES
                        (
                            "'.$icd10.'",
                            "'.$name.'"
                        )
                        ';


                        $result = mysqli_query($conn, $sql);
                        if(empty($result))
                        $status = false;


                        echo $sql."<br/>=======".json_encode($status)."<br/>";
        }

    }


}


echo json_encode(
    array(
        'status' => $status,
    )
    
);


?>
