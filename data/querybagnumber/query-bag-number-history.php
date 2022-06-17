<?php
    include('../../connection.php');

    $condition = '';
    $bloodtype =$_GET['bloodtype'];
    $bag_number =$_GET['bag_number'];
    $sub =$_GET['sub'];


    $sql = "SELECT CM.*,
                RB.requestblooddate,
                RB.requestbloodtime,
                RB.hn,PT.patientan,
                PT.patientfullname,
                ST.crossmacthstatusname
            FROM request_blood_crossmacth CM
            LEFT JOIN request_blood RB ON CM.requestbloodid = RB.requestbloodid
            LEFT JOIN patient PT ON RB.hn = PT.patienthn
            LEFT JOIN crossmacth_status ST ON CM.crossmacthstatusid = ST.crossmacthstatusid
            WHERE CM.bag_number = '$bag_number'
            AND CM.sub = '$sub'
            AND CM.bloodtype = '$bloodtype'

            UNION
						
SELECT 
'' AS requestbloodcrossmacthid,
'' AS requestbloodcrossmacthck, 
'' AS bloodstockid , '' AS seq ,
'' AS bag_number , '' AS sub , 
'' AS islight , '' AS hlamatch , '' AS bloodgroupid , '' AS rhid,
'' AS bloodtype , '' AS ctt_rt , '' AS ctt_37c , '' AS ctt_iat , '' AS ctt_ccc , '' AS cat,
'' AS rou , '' AS crossmacthresultid , '' AS crossmacthstatusid , '' AS crossmacthstatus2id , '' AS doctorid , '' AS isbloodpreparation,
'' AS requestbloodcrossmacthdatetime , '' AS requestbloodid , '' AS isreadyblood , '' AS bloodrequestunit , '' AS bloodrequestunitqty , 
'' AS bloodrequestcc,
'' AS readyblooddate , '' AS readybloodtime , '' AS confirmbloodrequestdate , '' AS confirmbloodrequesttime ,
'' AS ispayblood , DATE_FORMAT(BPM.patient_pay_date,'%Y-%m-%d') AS payblooddate,
BPM.patient_pay_time AS paybloodtime , '' AS payuser , '' AS isallergic , '' AS stoppayblooddate_allergic , '' AS stoppaybloodtime_allergic , 
'' AS totalbloodrequestcc_allergic,
'' AS sideeffects_allergic , '' AS sideeffectsdate_allergic , '' AS sideeffectstime_allergic , 
'' AS isincreasebodytemp_allergic , '' AS ischills_allergic , '' AS isurticaria_allergic,
'' AS isitching_allergic , '' AS isflushing_allergic , '' AS ismusclepain_allergic , '' AS ishypotension_allergic ,
'' AS ishypertension_allergic , '' AS isanaphylaxis_allergic,
'' AS isdyspnea_allergic , '' AS isdecreaseurineout_allergic , '' AS isdarkredurine_allergic , '' AS isother_allergic , 
'' AS othereffects_allergic , '' AS before_temp_allergic,
'' AS before_bpstart_allergic , '' AS before_bpend_allergic , '' AS before_pmin_allergic , '' AS before_rmin_allergic , 
'' AS after_temp_allergic , '' AS after_bpstart_allergic,
'' AS after_bpend_allergic , '' AS after_pmin_allergic , '' AS after_rmin_allergic , '' AS ishemolytictransfusionreation2_allergic , 
'' AS isfebrilehemolytictransfusionreation2_allergic , '' AS isallergicreation2_allergic,
'' AS isanaphylaxis2_allergic , '' AS isinfectionsepsisreatedtransfusion2_allergic , '' AS istransfusionreatedacutelunginjury2_allergic , 
'' AS isother2_allergic , '' AS othereffects2_allergic , '' AS ischeck_return,
'' AS bloodsavedate_return , '' AS bloodsavetime_return , '' AS blooddate_return , '' AS bloodtime_return , '' AS bloodcc_return ,
'' AS warm_retuen,
'' AS requestbloodreturnstatusid , '' AS username_return , '' AS username_confirmreturn , '' AS date_confirmreturn ,
'' AS time_confirmreturn , '' AS date_bloodrelease,
'' AS time_bloodrelease , '' AS result_testblood , '' AS remark_testblood , '' AS mostandunstatus , 
'' AS causereleaseremark , '' AS requestbloodcrossmacthremark,
'' AS bloodallergyrecorder , '' AS beaconid , '' AS wash_status , '' AS wash_status_remark , '' AS grouppayid , '' AS groupid,
'' AS user_testblood , '' AS conclusionofinvestigationresults , '' AS interpretation , '' AS isautocontrol ,
'' AS useblooddate , '' AS usebloodtime,
'' AS apidatapaymentblood , '' AS apiresultpaymentblood , 
'' AS paymentincomedate , '' AS paymentincometime,
'' AS paymentincomecode , '' AS paymentitem ,
'' AS requestblooddate , '' AS requestbloodtime , BPM.hn_pay_out AS hn , PT.patientan AS patientan ,

PT.patientfullname AS patientfullname , 'จ่ายให้ผู้ป่วยใน' AS crossmacthstatusname

FROM bloodstock_pay BP
JOIN bloodstock_pay_main BPM ON BPM.bloodstockpaymainid = BP.bloodstockpaymainid
JOIN patient PT ON PT.patienthn = BPM.hn_pay_out
JOIN bloodstock_pay_type BPT ON BPT.bloodstockpaytypeid = BP.bloodstockpaytypeid
WHERE BP.bag_number = '$bag_number'
AND BP.bloodstockpaytypeid = 8
AND BP.bloodtype = '$bloodtype'
            
";
    
    $query = mysqli_query($conn,$sql);

    $resultArray = array();
	while($result = mysqli_fetch_array($query))
	{
		array_push($resultArray,$result);
	}
    echo json_encode(
        array(
            'status' => true,
            'data' => $resultArray,
            'total' => count($resultArray)
        )
        
    );

    mysqli_close($conn);
?>