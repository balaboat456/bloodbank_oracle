<?php
include('../connection.php');

$condition = '';
$fromdate = $_GET['fromdate'];
$todate = $_GET['todate'];
$appointmenttype = $_GET['appointmenttype'];


$sql = "SELECT M.*,
DATE_FORMAT(STR_TO_DATE(M.DMY_repeatinfectiondate, '%d/%m/%Y' ), '%Y-%m-%d') AS repeatdate 
FROM
(
";
if($appointmenttype == 0 || $appointmenttype == 1)
$sql = $sql ."SELECT 	
														'นัดเจาะซ้ำ' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate1 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate1, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        RE.repeatinfectionappointmentstatus AS appstatus,
                                                        RE.repeatinfectionappointmentremark AS status_remark
													  	
														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 AND RE.repeatinfectiondate1 BETWEEN '$fromdate' AND '$todate'
														";
if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 2)
$sql = $sql . "SELECT 	
														'นัดฟังผล' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate3 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate3, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        RE.repeatinfectionappointmentstatus AS appstatus,
                                                        RE.repeatinfectionappointmentremark AS status_remark

														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 AND DATE_FORMAT(RE.repeatinfectiondate3, '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														";

if ($appointmenttype == 0)
$sql = $sql . "UNION";
if ($appointmenttype == 0 || $appointmenttype == 3)
$sql = $sql . "SELECT 	
														'นัดหมาย SDP' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														DN.sdpdonateappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.sdpdonateappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.assignsdpdate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														STF.name AS usercreate,
                                                        DN.appointmentstatus AS appstatus,
                                                        DN.appointmentremark AS status_remark
                                                        
														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN staff STF ON STF.id = DN.assignsdp
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.sdpdonateisappointment = 1 AND DN.sdpdonateappointmentdate BETWEEN '$fromdate' AND '$todate'
														GROUP BY DN.sdpdonateappointmentdate , DR.donoridcard
														";

if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 4)
$sql = $sql . "SELECT 
														'นัดหมาย Autologous' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														DN.hn AS hn,
														DN.autologousappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.autologousappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        DN.appointmentstatus AS appstatus,
                                                        DN.appointmentremark AS status_remark

														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.autologousisappointment = 1 
														AND DN.autologousappointmentdate BETWEEN '$fromdate' AND '$todate'
														";

if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 5)
$sql = $sql . "SELECT 
														BL.appointmentdetail AS typename,
														'Blood Letting' AS pathname,
														'BLOODLETTING' AS pathcode,
														'blood-letting.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														BL.appointment AS YMD_repeatinfectiondate,
														(BL.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														BL.bloodlettingid AS id,
														DATE_FORMAT(BL.bloodlettingdatetime,'%d/%m/%Y') AS datecreate,
													    US.fullname AS usercreate,
                                                        BL.appointmentstatus AS appstatus,
                                                        BL.appointmentremark AS status_remark

														FROM blood_letting BL
														LEFT JOIN patient PT ON BL.patientid = PT.patientid
														LEFT JOIN users US ON US.id = BL.usercreate 
														WHERE DATE_FORMAT( STR_TO_DATE( BL.appointment, '%d/%m/%Y' ), '%Y-%m-%d')  BETWEEN '$fromdate' AND '$todate'
														";

if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 6)
$sql = $sql . "SELECT 
														EX.appoittext AS typename,
														'Blood Exchange' AS pathname,
														'BLOODEXCHANGE' AS pathcode,
														'blood-exchange.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														EX.appointment AS YMD_repeatinfectiondate,
														(EX.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														EX.bloodexchangeid AS id ,
														DATE_FORMAT(bloodexchangedate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														EX.usercreate AS usercreate,
                                                        EX.appointmentstatus AS appstatus,
                                                        EX.appointmentremark AS status_remark

														FROM blood_exchange EX
														LEFT JOIN patient PT ON EX.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( EX.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														";

if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 7)
$sql = $sql . "SELECT 
														WR.appoittext AS typename,
														'Washed Red Cell' AS pathname,
														'WASHEDREDCELL' AS pathcode,
														'blood-washed-red-cell.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														WR.appointment AS YMD_repeatinfectiondate,
														(WR.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														WR.bloodwashedredcellid AS id,
														DATE_FORMAT(WR.bloodwashedredcelldatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														WR.usercreate AS usercreate,
                                                        WR.appointmentstatus AS appstatus,
                                                        WR.appointmentremark AS status_remark

														FROM blood_washed_red_cell WR
														LEFT JOIN patient PT ON WR.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( WR.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														 ";

if ($appointmenttype == 0)
$sql = $sql . "UNION";

if ($appointmenttype == 0 || $appointmenttype == 8)
$sql = $sql . "SELECT 
														ST.appoittext AS typename,
														'Serum Tear' AS pathname,
														'SERUMTEAR' AS pathcode,
														'blood-serum-tear.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														ST.appointment AS YMD_repeatinfectiondate,
														(ST.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														ST.serumtearid AS id,
														DATE_FORMAT(ST.serumteardatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
													    ST.usercreate	AS usercreate,
                                                        ST.appointmentstatus AS appstatus,
                                                        ST.appointmentremark AS status_remark

														FROM serum_tear ST
														LEFT JOIN patient PT ON ST.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( ST.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														";

														$sql = $sql . "UNION
														SELECT 
														APPT.appointment_typename AS typename,
														'บริจาคโลหิต' AS pathname,
														'APPOINTMENT' AS pathcode,
														'dashboard.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														'' AS YMD_repeatinfectiondate,
														DATE_FORMAT(APP.appointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														APP.appointmentid as id,
														DATE_FORMAT(APP.appointment_createdate,'%d/%m/%Y') AS datecreate , 
														STF.name AS usercreate,
                                                        APP.appointmentstatus AS appstatus,
                                                        APP.appointmentstatusremark AS status_remark

														FROM appointment APP
														JOIN donor DR ON APP.donoridcard = DR.donoridcard
														JOIN appointment_type APPT ON APP.appointmenttype = APPT.appointment_typeid
														JOIN staff STF ON STF.id = APP.appointment_usercreate
														JOIN donate DN ON DN.donorid = DR.donorid
														WHERE APP.appointmentdate BETWEEN '$fromdate' AND '$todate'
														";

if ($appointmenttype == 1)
$sql = $sql . "AND APP.appointmenttype = 1";

if ($appointmenttype == 2)
$sql = $sql . "AND APP.appointmenttype = 2";

if ($appointmenttype == 3)
$sql = $sql . "AND APP.appointmenttype = 3";

if ($appointmenttype == 4)
$sql = $sql . "AND APP.appointmenttype = 4";

if ($appointmenttype == 5)
$sql = $sql . "AND APP.appointmenttype = 5";

if ($appointmenttype == 6)
$sql = $sql . "AND APP.appointmenttype = 6";

if ($appointmenttype == 7)
$sql = $sql . "AND APP.appointmenttype = 7";

if ($appointmenttype == 8)
$sql = $sql . "AND APP.appointmenttype = 8";

$sql = $sql . ") M
														GROUP BY M.DMY_repeatinfectiondate ,  M.donoridcard
														ORDER BY  repeatdate ASC";

if ($appointmenttype == 0){
	$sql = "SELECT M.*,
DATE_FORMAT(STR_TO_DATE(M.DMY_repeatinfectiondate, '%d/%m/%Y' ), '%Y-%m-%d') AS repeatdate 
FROM
(
SELECT 	
														'นัดเจาะซ้ำ' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate1 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate1, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        RE.repeatinfectionappointmentstatus AS appstatus,
                                                        RE.repeatinfectionappointmentremark AS status_remark
													  	
														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 
														AND RE.repeatinfectiondate1 BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 	
														'นัดฟังผล' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE_REP' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														RE.repeatinfectiondate3 AS YMD_repeatinfectiondate,
														DATE_FORMAT(RE.repeatinfectiondate3, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														RE.donateid,
														RE.repeatinfectionid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        RE.repeatinfectionappointmentstatus AS appstatus,
                                                        RE.repeatinfectionappointmentremark AS status_remark

														FROM donate_repeatinfection RE
														LEFT JOIN donate DN ON RE.donateid = DN.donateid
														LEFT JOIN users US ON US.id = DN.confirmblooddonationid
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														WHERE RE.active <> 0 
														AND DATE_FORMAT(RE.repeatinfectiondate3, '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 	
														'นัดหมาย SDP' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														DN.sdpdonateappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.sdpdonateappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.assignsdpdate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														STF.name AS usercreate,
                                                        DN.appointmentstatus AS appstatus,
                                                        DN.appointmentremark AS status_remark
                                                        
														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN staff STF ON STF.id = DN.assignsdp
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.sdpdonateisappointment = 1 
														AND DN.sdpdonateappointmentdate BETWEEN '$fromdate' AND '$todate'
														GROUP BY DN.sdpdonateappointmentdate , DR.donoridcard
														UNION
														
														SELECT 
														'นัดหมาย Autologous' AS typename,
														'บริจาคโลหิต' AS pathname,
														'DONATE' AS pathcode,
														'blood-donor-record.php' AS typepath,
														'1' AS typestatus,
														DN.hn AS hn,
														DN.autologousappointmentdate AS YMD_repeatinfectiondate,
														DATE_FORMAT(DN.autologousappointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														DN.donateid as id,
														DATE_FORMAT(DN.donation_date,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														US.fullname AS usercreate,
                                                        DN.appointmentstatus AS appstatus,
                                                        DN.appointmentremark AS status_remark

														FROM donate DN
														LEFT JOIN donor DR ON DN.donorid = DR.donorid
														LEFT JOIN users US ON US.id = DN.inspectorid
														WHERE DN.autologousisappointment = 1 
														AND DN.autologousappointmentdate BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 
														BL.appointmentdetail AS typename,
														'Blood Letting' AS pathname,
														'BLOODLETTING' AS pathcode,
														'blood-letting.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														BL.appointment AS YMD_repeatinfectiondate,
														(BL.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														BL.bloodlettingid AS id,
														DATE_FORMAT(BL.bloodlettingdatetime,'%d/%m/%Y') AS datecreate,
													    US.fullname AS usercreate,
                                                        BL.appointmentstatus AS appstatus,
                                                        BL.appointmentremark AS status_remark

														FROM blood_letting BL
														LEFT JOIN patient PT ON BL.patientid = PT.patientid
														LEFT JOIN users US ON US.id = BL.usercreate 
														WHERE DATE_FORMAT( STR_TO_DATE( BL.appointment, '%d/%m/%Y' ), '%Y-%m-%d')  BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 
														EX.appoittext AS typename,
														'Blood Exchange' AS pathname,
														'BLOODEXCHANGE' AS pathcode,
														'blood-exchange.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														EX.appointment AS YMD_repeatinfectiondate,
														(EX.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														EX.bloodexchangeid AS id ,
														DATE_FORMAT(bloodexchangedate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														EX.usercreate AS usercreate,
                                                        EX.appointmentstatus AS appstatus,
                                                        EX.appointmentremark AS status_remark

														FROM blood_exchange EX
														LEFT JOIN patient PT ON EX.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( EX.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 
														WR.appoittext AS typename,
														'Washed Red Cell' AS pathname,
														'WASHEDREDCELL' AS pathcode,
														'blood-washed-red-cell.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														WR.appointment AS YMD_repeatinfectiondate,
														(WR.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														WR.bloodwashedredcellid AS id,
														DATE_FORMAT(WR.bloodwashedredcelldatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														WR.usercreate AS usercreate,
                                                        WR.appointmentstatus AS appstatus,
                                                        WR.appointmentremark AS status_remark

														FROM blood_washed_red_cell WR
														LEFT JOIN patient PT ON WR.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( WR.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														
														UNION
														
														SELECT 
														ST.appoittext AS typename,
														'Serum Tear' AS pathname,
														'SERUMTEAR' AS pathcode,
														'blood-serum-tear.php' AS typepath,
														'0' AS typestatus,
														PT.patienthn AS hn,
														ST.appointment AS YMD_repeatinfectiondate,
														(ST.appointment) AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(PT.patientfname,''),' ',IFNULL(PT.patientlname,'')) AS fullname ,
														PT.patientidcard AS donoridcard,
														'' AS donateid,
														ST.serumtearid AS id,
														DATE_FORMAT(ST.serumteardatetime,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
													    ST.usercreate	AS usercreate,
                                                        ST.appointmentstatus AS appstatus,
                                                        ST.appointmentremark AS status_remark

														FROM serum_tear ST
														LEFT JOIN patient PT ON ST.patientid = PT.patientid
														WHERE DATE_FORMAT( STR_TO_DATE( ST.appointment, '%d/%m/%Y' ), '%Y-%m-%d') BETWEEN '$fromdate' AND '$todate'
														
														UNION
														SELECT 
														APPT.appointment_typename AS typename,
														'บริจาคโลหิต' AS pathname,
														'APPOINTMENT' AS pathcode,
														'dashboard.php' AS typepath,
														'1' AS typestatus,
														'' AS hn,
														'' AS YMD_repeatinfectiondate,
														DATE_FORMAT(APP.appointmentdate, '%d/%m/%Y') AS DMY_repeatinfectiondate, 
														CONCAT(IFNULL(DR.fname,''),' ',IFNULL(DR.lname,'')) AS fullname ,
														DR.donoridcard,
														DN.donateid,
														APP.appointmentid as id,
														DATE_FORMAT(APP.appointment_createdate,'%d/%m/%Y') AS datecreate , -- วันที่ทำการนัด
														STF.name AS usercreate,
                                                        APP.appointmentstatus AS appstatus,
                                                        APP.appointmentstatusremark AS status_remark

														FROM appointment APP
														JOIN donor DR ON APP.donoridcard = DR.donoridcard
														JOIN appointment_type APPT ON APP.appointmenttype = APPT.appointment_typeid
														JOIN staff STF ON STF.id = APP.appointment_usercreate
														JOIN donate DN ON DN.donorid = DR.donorid
														
														WHERE APP.appointmentdate BETWEEN '$fromdate' AND '$todate'
														
														) M
														GROUP BY M.DMY_repeatinfectiondate ,  M.donoridcard
														ORDER BY  repeatdate ASC";
}

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
