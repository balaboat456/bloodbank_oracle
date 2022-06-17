<?php
include('../../connection.php');

$condition = '';
$keyword = $_GET['keyword'];
if (!empty($keyword))

    $sql = "SELECT  * 
FROM bloodstock_type 
WHERE bloodstocktypeid NOT IN ('HTFDC','LPPC','PC')
ORDER BY bloodstocksort";


$query = mysqli_query($conn, $sql);

$resultArray = array();
while ($result = mysqli_fetch_array($query)) {
    array_push($resultArray, $result);
}
echo json_encode(
    array(
        'status' => true,
        'data' => $resultArray,
        'sql' => $sql
    )

);

mysqli_close($conn);
