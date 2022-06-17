<?php
    session_start();
    include('connection.php');
    include('data/running.php');
    include('data/dateFormat.php');
    include('dateNow.php');
    include('checkPermission.php');
    date_default_timezone_set('Asia/Bangkok');
    $status = 1;
    $condition = "";
    $idcard = $_GET["idcard"];
    $date = $_GET["date"];


    if(!empty($idcard))
    {
        $condition = " AND donoridcard = '$idcard' ";
    }else
    {
        $condition = " AND DATE_FORMAT(donatelogdatetime, '%Y-%m-%d')  = '$date' ";
    }
   
    
    $sql = "SELECT * FROM donate_log WHERE donoridcard <> '' $condition  GROUP BY donoridcard";
 
    $query = mysqli_query($conn,$sql);

	while($result = mysqli_fetch_array($query))
	{

        $donorfile = $_POST['donorfile'];
        $runningImage = getRunningYM('IM');
        $pofilecode = $runningImage['code'];
        $donoridcard = $result["donoridcard"] ;
		$donatelogtext = json_decode($result["donatelogtext"]) ;
        $donorimagepath = "";

        $donorfile = "data:image/png;base64,".$donatelogtext->data->photo;
        if(!empty($donorfile))
        {
            
            $donorimagepath = do_upload($donorfile,$pofilecode,"uploads/donor_pofile/");

            $sql_uat = "UPDATE donor SET donorimagepath = '$donorimagepath' WHERE donoridcard = '$donoridcard' ";
 
            $result_update = mysqli_query($conn, $sql_uat);
            if(empty($result_update))
            $status = 0;

            echo $sql_uat."<br/>";
        }

        echo $donoridcard."<br/>";
        
	}

    echo $status;

    // end การบริจาค
    function loadUpFile()
    {
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"uploads/".$_FILES["filUpload"]["name"]))
        {
            return $_FILES["filUpload"]["name"];
          
        }else
        {
            return "";
        }

    }

    function do_upload($image,$name,$path) {
        $random_string = substr(str_shuffle("_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $imageArr = explode(",",$image);
        
        $imageDoc1 = explode("/",$imageArr[0]);
        $imageDoc2 = explode(";",$imageDoc1[1]);
        $data = base64_decode($imageArr[1]);
       
        $file = "";
        if($imageDoc2[0] == "vnd.openxmlformats-officedocument.wordprocessingml.document")
        {
            $file = $path.$name.$random_string.'.'.'docx';
        }else
        {
            $file = $path.$name.$random_string.'.'.$imageDoc2[0];
        }
        
        file_put_contents($file, $data);
        
        return $file;
     
    }

?>