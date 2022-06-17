<?php

include('jasper-connection.php');
include('../dateNow.php');
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../connection.php');

$id = $_GET['id'];
$report = $_GET['report'];
 
$printdate = dateNowDMY();
$printdatetime = dateNowDMY()." ".date("H:i");
$fullname = $_SESSION['fullname'];

$visual_check_of_blood_sample = "" ;
$appearance_of_blood_bag = "" ;
$appearance_of_blood_set = "" ;
$abo_and_rh = "" ;
$abo_and_rh2 = "";
$crossmatch = "" ;
$crossmatch2 = "" ;
$antibody_screening = "" ;
$antibody_identification = "" ;

$dat = "" ;
$mf_agglutination = "" ;
$urin_free_hemoglobin = "" ;
$serum_bilirubin = "" ;

$other1 = "" ;
$other2 = "" ;
$other3 = "" ;
$other4 = "" ;
$other5 = "" ;

$conclusionofinvestigationresults = "";
$interpretation = "";


	$sql = "SELECT LI.labinvestigationid,
	LI.labinvestigationname,
	TS.requestbloodcrossmacthlabtestpost,
	TS.requestbloodcrossmacthlabtestpre,
	SPRE.bloodgroupserumname AS requestbloodcrossmacthlabtestpre_serum,
	SPOST.bloodgroupserumname AS requestbloodcrossmacthlabtestpost_serum,
	TS.requestbloodcrossmacthlabtestother,
	TS.requestbloodcrossmacthlabtestunit,
	CM.user_testblood,
	CM.conclusionofinvestigationresults,
	CM.interpretation


	FROM request_blood RB
	LEFT JOIN patient PT ON RB.hn = PT.patienthn
	LEFT JOIN ward WD ON PT.wardid = WD.wardid
	LEFT JOIN doctor DT ON RB.doctorid = DT.doctorid
	LEFT JOIN request_blood_crossmacth CM ON RB.requestbloodid = CM.requestbloodid
	LEFT JOIN rh RH ON CM.rhid = RH.rhid
	LEFT JOIN request_blood_crossmacth_lab_test TS ON CM.requestbloodcrossmacthid = TS.requestbloodcrossmacthid
	LEFT JOIN lab_investigation LI ON TS.labinvestigationid = LI.labinvestigationid
	LEFT JOIN blood_group_serum SPRE ON TS.requestbloodcrossmacthlabtestpre = SPRE.bloodgroupserumid
	LEFT JOIN blood_group_serum SPOST ON TS.requestbloodcrossmacthlabtestpost = SPOST.bloodgroupserumid

	WHERE CM.requestbloodcrossmacthid = '$id'
	ORDER BY LI.sort ASC
	"
	
    ;
    
    $query = mysqli_query($conn,$sql);

	$count = 1;
	while($result = mysqli_fetch_array($query))
	{
		if($result["labinvestigationid"] == "1")
		{
			$abo_and_rh = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",";
		}else if($result["labinvestigationid"] == "2")
		{
			$antibody_identification = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "3")
		{
			$antibody_screening = $result["requestbloodcrossmacthlabtestpre_serum"].",".$result["requestbloodcrossmacthlabtestpost_serum"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "4")
		{
			$appearance_of_blood_bag = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "5")
		{
			$appearance_of_blood_set = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}
		else if($result["labinvestigationid"] == "7")
		{
			$crossmatch = $result["requestbloodcrossmacthlabtestpre_serum"].",".$result["requestbloodcrossmacthlabtestpost_serum"].",".$result["requestbloodcrossmacthlabtestunit"];
		}
		else if($result["labinvestigationid"] == "21")
		{
			$crossmatch2 = $result["requestbloodcrossmacthlabtestpre_serum"].",".$result["requestbloodcrossmacthlabtestpost_serum"].",".$result["requestbloodcrossmacthlabtestunit"];
		}
		else if($result["labinvestigationid"] == "8")
		{
			$dat = $result["requestbloodcrossmacthlabtestpre_serum"].",".$result["requestbloodcrossmacthlabtestpost_serum"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "10")
		{
			$abo_and_rh2 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "11")
		{
			$serum_bilirubin = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "12")
		{
			$visual_check_of_blood_sample = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"];
		}else if($result["labinvestigationid"] == "13")
		{
			if($count == 1)
			{
				$other1 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",".$result["requestbloodcrossmacthlabtestother"];
			}else if($count == 2)
			{
				$other2 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",".$result["requestbloodcrossmacthlabtestother"];
			}else if($count == 3)
			{
				$other3 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",".$result["requestbloodcrossmacthlabtestother"];
			}else if($count == 4)
			{
				$other4 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",".$result["requestbloodcrossmacthlabtestother"];
			}else if($count == 5)
			{
				$other5 = $result["requestbloodcrossmacthlabtestpre"].",".$result["requestbloodcrossmacthlabtestpost"].",".$result["requestbloodcrossmacthlabtestunit"].",".$result["requestbloodcrossmacthlabtestother"];
			}
			
			$count++;
		}

		$user_testblood = $result["user_testblood"];
		$conclusionofinvestigationresults = $result["conclusionofinvestigationresults"];
		$interpretation = $result["interpretation"];
    }



$controls = array(
	"printdate" => "$printdate",
	"printdatetime" => "$printdatetime",
	"fullname" => "$fullname",
	"id" => "$id",

	"visual_check_of_blood_sample" => "$visual_check_of_blood_sample",
	"appearance_of_blood_bag" => "$appearance_of_blood_bag",
	"appearance_of_blood_set" => "$appearance_of_blood_set",
	"abo_and_rh" => "$abo_and_rh",
	"abo_and_rh2" => "$abo_and_rh2",
	"crossmatch" => "$crossmatch",
	"crossmatch2" => "$crossmatch2",   //crossmatch2
	"antibody_screening" => "$antibody_screening",
	"antibody_identification" => "$antibody_identification",
	"dat" => "$dat",
	"mf_agglutination" => "$mf_agglutination",
	"urin_free_hemoglobin" => "$urin_free_hemoglobin",
	"serum_bilirubin" => "$serum_bilirubin",

	"other1" => "$other1",
	"other2" => "$other2",
	"other3" => "$other3",
	"other4" => "$other4",
	"other5" => "$other5",

	"user_testblood" => "$user_testblood",
	"conclusionofinvestigationresults" => "$conclusionofinvestigationresults",
	"interpretation" => "$interpretation"
);

$report = $client->reportService()->runReport("$jasper_server_config_path"."blood_allergic_form", 'pdf',null,null,$controls);
 
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Description: File Transfer');
// header('Content-Disposition: attachment; filename=report.pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . strlen($report));
header('Content-Type: application/pdf; charset=utf-8;');
 
echo $report; 

?>